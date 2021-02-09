function nl2br (str) {
    var breakTag = '<br />';
    var replaceStr = '$1'+ breakTag +'$2';
    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, replaceStr);
}

function fillSelectByObject(selectId, obj, valLabelFunc){
    var select = document.getElementById(selectId);
    var first = true;
    for (const property in obj) {

        var valLabel = [property, property];
        if(valLabelFunc != null){
            valLabel = valLabelFunc(property, obj[property]);
        }else if(obj[property].label != undefined){
            valLabel[1] = obj[property].label;
        }

        if(valLabel.length == 2){
            var option = new Option();
            option.value = valLabel[0];
            option.innerHTML = valLabel[1];
            select.appendChild(option);
        }
    }
}

function initSelect(selectId, obj, valLabelFunc, onChangeFunc){
    selectData[selectId] = obj;
    fillSelectByObject(selectId, obj, valLabelFunc);

    if(onChangeFunc != null){
        var select = document.getElementById(selectId);
        select.onchange = onChangeFunc;
        select.onchange();
    }
}
function getSelectedValueFromSelect(selectId){
    var select = document.getElementById(selectId);
    if(select.selectedIndex > -1){
        return select.options[select.selectedIndex].value;
    }

    return null;
}

function getSelectedObjectFromSelect(selectId){
    var selected = getSelectedValueFromSelect(selectId);
    if(selected != null){
        return selectData[selectId][selected];
    }

    return {};
}

function buildHiddenFields(formId){
    var form = document.getElementById(formId);

    var urlParams = new URLSearchParams(window.location.search);
    var entries = urlParams.entries();
    for(pair of entries) { 
        
        var elm = document.createElement('input');
        elm.setAttribute('type', 'hidden');
        elm.setAttribute('name', pair[0]);
        elm.value = pair[1];

        form.appendChild(elm);
    }
}