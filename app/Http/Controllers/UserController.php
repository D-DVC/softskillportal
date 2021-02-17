<?php

namespace App\Http\Controllers;

use App\Models\group;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|\Illuminate\Http\RedirectResponse
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        if ($user->getRoleNames()[0] === 'Admin') {
            $data = User::orderBy('id', 'DESC')->paginate(5);;
            return view('user.index', compact('data'))
                ->with('i', ($request->input('page', 1) - 1) * 5);
        }
        return Redirect::back()->with('danger', 'U heeft niet de juiste rechten om deze pagina te bezoeken');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|\Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        $user = Auth::user();
        if ($user->getRoleNames()[0] === 'Admin') {
            $roles = Role::pluck('name', 'name')->all();
            $groups = group::pluck('name', 'name')->all();
            return view('user.create', compact('roles', 'groups'));
        }
        return Redirect::back()->with('danger', 'U heeft niet de juiste rechten om deze pagina te bezoeken');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required',
            'groups' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|\Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|\Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $user = Auth::user();
        if ($user->getRoleNames()[0] === 'Admin' || $user->id === (int)$id) {
            $user = User::find($id);
            $roles = Role::pluck('name', 'name')->all();
            $group = group::pluck('name', 'name')->all();
            $userRole = $user->roles->pluck('name', 'name')->all();
            $userGroup = $user->groups->pluck('name', 'name')->all();

            return view('user.edit', compact('user', 'roles', 'userRole', 'group', 'userGroup'));
        }
        return Redirect::back()->with('danger', 'U heeft niet de juiste rechten om deze pagina te bezoeken');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'roles' => 'required',
        ]);

        $input = $request->all();

        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);

        $user->groups()->detach();
        foreach ($input['groups'] as $group) {
            $group_id = DB::table('groups')->where('name', $group)->pluck('id');

            $user->groups()->attach($group_id);

        }
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $user = Auth::user();
        if ($user->getRoleNames()[0] === 'Admin') {
            User::find($id)->delete();
            return redirect()->route('users.index')
                ->with('success', 'User deleted successfully');
        }
        return Redirect::back()->with('danger', 'U heeft niet de juiste rechten om deze pagina te bezoeken');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|\Illuminate\Http\RedirectResponse
     */
    public function CreateList()
    {
        $user = Auth::user();
        if ($user->getRoleNames()[0] === 'Admin') {
            $groups = group::pluck('name', 'name')->all();
            return view('user.createList', compact('groups'));
        }
        return Redirect::back()->with('danger', 'U heeft niet de juiste rechten om deze pagina te bezoeken');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function StoreList(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'groups' => 'required'
        ]);
        $input = $request->all();
        $students = str_replace(' ', '', explode(',', $input['name']));
        foreach ($students as $student) {
            $user = User::create([
                'name' => $student,
                'email' => $student . "@mydavinci.nl",
                'password' => Hash::make('Welkom123'),
            ]);

            $user->assignRole('User');

            foreach ($input['groups'] as $group) {
                $group_id = DB::table('groups')->where('name', $group)->pluck('id');

                $user->groups()->attach($group_id);

            }

        }

        return redirect()->route('users.index')
            ->with('success', 'User created successfully');

    }
}