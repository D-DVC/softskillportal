var selectData = {};
var races = {
    'Human' : {
        'info' : 'https://www.dndbeyond.com/races/human',
        'namegen' : 'https://www.fantasynamegenerators.com/dnd-human-names.php'
    },
    'Elf' : {
        'info' : 'https://www.dndbeyond.com/races/elf',
        'namegen' : 'https://www.fantasynamegenerators.com/dnd-elf-names.php'
    },
    'Half-Elf' : {
        'info' : 'https://www.dndbeyond.com/races/half-elf',
        'namegen' : 'https://www.fantasynamegenerators.com/dnd-half-elf-names.php'
    },
    'Dwarf' : {
        'info' : 'https://www.dndbeyond.com/races/dwarf',
        'namegen' : 'https://www.fantasynamegenerators.com/dnd-dwarf-names.php'
    },
    'Halfling' : {
        'info' : 'https://www.dndbeyond.com/races/halfling',
        'namegen' : 'https://www.fantasynamegenerators.com/dnd-halfling-names.php'
    },
    'Aarakocra' : {
        'info' : 'https://www.dndbeyond.com/races/aarakocra',
        'namegen' : 'https://www.fantasynamegenerators.com/dnd-aarakocra-names.php'
    },
    'Aasimar' : {
        'info' : 'https://www.dndbeyond.com/sources/basic-rules/races#Aasimar',
        'namegen' : 'https://www.fantasynamegenerators.com/dnd-aasimar-names.php'
    },
    'Gnome' : {
        'info' : 'https://www.dndbeyond.com/races/gnome',
        'namegen' : 'https://www.fantasynamegenerators.com/dnd-gnome-names.php'
    },
    'Dragonborn' : {
        'info' : 'https://www.dndbeyond.com/races/dragonborn',
        'namegen' : 'https://www.fantasynamegenerators.com/dnd-dragonborn-names.php'
    },
    'Genasi' : {
        'info' : 'https://www.dndbeyond.com/races/genasi',
        'namegen' : 'https://www.fantasynamegenerators.com/dnd-genasi-names.php'
    },
    'Goliath' : {
        'info' : 'https://www.dndbeyond.com/races/goliath',
        'namegen' : 'https://www.fantasynamegenerators.com/dnd-goliath-names.php'
    },
    'Half-Orc' : {
        'info' : 'https://www.dndbeyond.com/races/half-orc',
        'namegen' : 'https://www.fantasynamegenerators.com/dnd-half-orc-names.php'
    },
    'Tiefling' : {
        'info' : 'https://www.dndbeyond.com/races/tiefling',
        'namegen' : 'https://www.fantasynamegenerators.com/dnd-tiefling-names.php'
    }
};

var classes = {
    'Barbarian' : {
        'info' : 'http://dndbeyond.com/sources/basic-rules/classes#Barbarian',
        'mainability' : 'str'
    },
    'Bard' : {
        'info' : 'http://dndbeyond.com/sources/basic-rules/classes#Bard',
        'mainability' : 'cha'
    },
    'Cleric' : {
        'info' : 'http://dndbeyond.com/sources/basic-rules/classes#Cleric',
        'mainability' : 'wis'
    },
    'Druid' : {
        'info' : 'http://dndbeyond.com/sources/basic-rules/classes#Druid',
        'mainability' : 'wis'
    },
    'Fighter' : {
        'info' : 'http://dndbeyond.com/sources/basic-rules/classes#Fighter',
        'mainability' : 'str'
    },
    'Monk' : {
        'info' : 'http://dndbeyond.com/sources/basic-rules/classes#Monk',
        'mainability' : 'dex'
    },
    'Paladin' : {
        'info' : 'http://dndbeyond.com/sources/basic-rules/classes#Paladin',
        'mainability' : 'cha'
    },
    'Ranger' : {
        'info' : 'http://ndbeyond.com/sources/basic-rules/classes#Ranger',
        'mainability' : 'wis'
    },
    'Rogue' : {
        'info' : 'http://dndbeyond.com/sources/basic-rules/classes#Rogue',
        'mainability' : 'dex'
    },
    'Sorcerer' : {
        'info' : 'http://dndbeyond.com/sources/basic-rules/classes#Sorcerer',
        'mainability' : 'cha'
    },
    'Warlock' : {
        'info' : 'http://dndbeyond.com/sources/basic-rules/classes#Warlock',
        'mainability' : 'cha'
    },
    'Wizard' : {
        'info' : 'http://dndbeyond.com/sources/basic-rules/classes#Wizard',
        'mainability' : 'int'
    }
};

var backgrounds = {
    'Acolyte' : {
        'label' : 'Misdinaar (Acolyte)',
        'info' : 'https://www.dndbeyond.com/backgrounds/acolyte'
    },
    'Criminal / Spy' : {
        'label' : 'Crimineel (Criminal / Spy)',
        'info' : 'https://www.dndbeyond.com/backgrounds/criminal-spy'
    },
    'Folk Hero' : {
        'label' : 'Volksheld (Folk Hero)',
        'info' : 'https://www.dndbeyond.com/backgrounds/folk-hero'
    },
    'Haunted One' : {
        'label' : 'Gekweld (Haunted One)',
        'info' : 'https://www.dndbeyond.com/backgrounds/haunted-one'
    },
    'Noble' : {
        'label' : 'Edele (Noble)',
        'info' : 'https://www.dndbeyond.com/backgrounds/noble'
    },
    'Sage' : {
        'label' : 'Wijsgeer (Sage)',
        'info' : 'https://www.dndbeyond.com/backgrounds/sage'
    },
    'Soldier' : {
        'label' : 'Soldaat / Gezachtsvoerder (Soldier)',
        'info' : 'https://www.dndbeyond.com/backgrounds/soldier'
    }
}

var states = {
    'Agarudian Empire' : {
        'current' : true,
        'capital' : 'Lilenohr',
        'mainpopulation' : ['Elf']
    }, 
    'Kingdom of Bedria' : {
        'current' : true,
        'capital' : 'Cavernkeep',
        'mainpopulation' : ['Human']
    },
    'Bitterguard' : {
        'current' : true,
        'capital' : 'Coldwaterkeep',
        'mainpopulation' : ['Human']
    },
    'Bronhelm' : {
        'current' : true,
        'capital' : 'Hilltopkeep',
        'mainpopulation' : ['Human']
    },
    'The Colcipian Federation of Islands' : {
        'current' : true,
        'capital' : 'Adarha',
        'mainpopulation' : ['Genasi']
    },
    'The Feymouth' : {
        'current' : false,
        'capital' : 'Myttr',
        'mainpopulation' : ['Fey']
    }, 
    'The Forsaken Wastes' : {
        'current' : true,
        'capital' : null,
        'mainpopulation' : ['Tiefling']
    },
    'The Fee Cities of Sepria' : {
        'current' : false,
        'capital' : null,
        'mainpopulation' : ['Tortle']
    }, 
    'Gnok' : {
        'current' : false,
        'capital' : 'Mogg',
        'mainpopulation' : ['Goblin']
    }, 
    'Lytria' : {
        'current' : true,
        'capital' : 'Sturr',
        'mainpopulation' : ['Human', 'Elf']
    },
    'Mivergia Lowlands' : {
        'current' : true,
        'capital' : null,
        'mainpopulation' : ['Halfling']
    },
    'Orenorgrove' : {
        'current' : false,
        'capital' : 'Lorian',
        'mainpopulation' : ['Grung']
    }, 
    'Owlreach' : {
        'current' : true,
        'capital' : 'Quácohausta (the Crows Nest)',
        'mainpopulation' : ['Elf']
    }, 
    'Pitria' : {
        'current' : true,
        'capital' : null,
        'mainpopulation' : ['various']
    }, 
    'Rhikkaa' : {
        'current' : false,
        'capital' : 'Kruhk',
        'mainpopulation' : ['Aarakocra', 'Aasimar']
    }, 
    'Shathar' : {
        'current' : true,
        'capital' : 'North Chenastus',
        'mainpopulation' : ['Human','Elf','Dwarf']
    }, 
    'Shatho' : {
        'current' : true,
        'capital' : 'South Chenastus',
        'mainpopulation' : ['Human','Elf','Dwarf']
    }, 
    'Stormgorge' : {
        'current' : true,
        'capital' : 'Kinarzad',
        'mainpopulation' : ['Dwarf']
    },
    'Scythra' : {
        'current' : false,
        'capital' : '-unknown-',
        'mainpopulation' : ['Undead']
    },
    'Uggodh' : {
        'current' : true,
        'capital' : 'Tharenbel',
        'mainpopulation' : ['Orc']
    }, 
    'Vellendor' : {
        'current' : true,
        'capital' : 'New Wendra',
        'mainpopulation' : ['Human']
    },
    'The Void' : {
        'current' : false,
        'capital' : '-unknown-',
        'mainpopulation' : ['Aasimar' ]
    },
    'Wellatan' : {
        'current' : true,
        'capital' : 'Wendra',
        'mainpopulation' : ['Human']
    }, 
    'Yulfond' : {
        'current' : true,
        'capital' : 'Talkundukk',
        'mainpopulation' : ['Goliath']
    }, 
    'Zeirru' : {
        'current' : true,
        'capital' : 'Rulgra',
        'mainpopulation' : ['Dragonborn']
    }
};

var abilities = {
    'str' : {},
    'dex' : {},
    'con' : {},
    'int' : {},
    'wis' : {},
    'cha' : {},
};