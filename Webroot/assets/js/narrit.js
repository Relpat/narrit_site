function NarritFE() {
    var editForm = $("#eddit-formular");

    if ($(editForm).length) {
        var cchiffreConfig = {
            editForm: editForm
        }
        var cchiffre = new CaeserChiffre();
        cchiffre.init(cchiffreConfig);
    }
}

var narritFe = new NarritFE();