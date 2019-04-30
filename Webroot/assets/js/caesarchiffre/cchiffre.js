/**
 * The very powerful CaeserChiffre-Editor
 *
 * @constructor
 */
function CaeserChiffre() {
    let that = this,
        debugmode = true,
        buggy = new Buggy(), editForm;

    // the global vars
    let currentTextField = document.getElementsByTagName("") || null;
    let currentText = "";

    function _readTextField() {
        let textfield = currentTextField;
        if (!textfield) {
            Console.error("Error: no textfield set.");
            return;
        }
        let currentText = textfield.innerHTML;
        _setCurrentText(currentText);
    }

    function _getCurrentText() {
        return currentText;
    }

    function _setCurrentText(readText) {
        currentText = readText;
        if (debugmode) {
            buggy.message(arguments, "currentText", currentText);
        }
    }

    function _parseText() {
        _readTextField();
        let currentText = _getCurrentText();
        let decodedText = Manipulator.htmlentities.decode(currentText);
        buggy.message(arguments, "currentText", currentText);
        buggy.message(arguments, "decodedText", decodedText);
        buggy.message(arguments, "currentTextField", currentTextField);
        currentTextField.innerHTML = decodedText;
    };

    function _init(config) {
        buggy.message(arguments, "Start CaesarChiffre with config", config);
        editForm = config.editForm;
        if (debugmode) {
            buggy = new Buggy();
        }

        buggy.message(arguments, "Schwubbel");
        // make html-content editable
        $(".cchiff-editable").attr("contenteditable", true);

        userInteractive();
        createInteractiveMenu();

        function userInteractive() {
            let editFields = document.querySelectorAll(".cchiff-editable");
            for (let element of editFields) {
                element.addEventListener("click", function (index, data) {
                    buggy.message(arguments, "change currentfield")
                    currentTextField = this;
                    _readTextField();
                });
            }
        }

        function createInteractiveMenu() {
            let mainMenu = $("<div/>", {
                "class": "btn-group-vertical position-fixed float-right",
                "role": "group"
            }).css({
                "top": "120px",
                "right": "60px"
            })
            createElementButtons();
            $(editForm).append(mainMenu);

            /**
             * create the Buttons
             */
            function createElementButtons() {
                buggy.message(arguments, "that", that);
                let buttonsConfig = {
                    "bold": {
                        config: {
                            "class": "btn btn-primary text-action-button font-weight-bold",
                            "data-action-type": "bold",
                            "text": "bold",
                        },
                        action: {
                            "click": (function () {
                                Manipulator.selectedText.surroundWithTag("b")
                            })
                        }
                    },
                    "italic": {
                        config: {
                            "class": "btn btn-primary text-action-button font-italic",
                            "data-action-type": "italic",
                            "text": "italic",
                        },
                        action: {
                            "click": (function () {
                                Manipulator.selectedText.surroundWithTag("i")
                            })
                        }
                    },
                };

                /**
                 * add buttons
                 */
                for (let buttontype in buttonsConfig) {
                    let button = $("<button/>", buttonsConfig[buttontype].config);
                    $(button).on(buttonsConfig[buttontype].action);
                    mainMenu.append(button);
                }
            }
        }
    }

    let Manipulator = new _Manipulator();

    function _Manipulator() {
        buggy.message(arguments, "init Manipulator");
        let that = this;
        return {
            htmlentities: function () {
                buggy.message(arguments, "init htmlentities");

                /**
                 * Converts a string to its html characters completely.
                 *
                 * @param {String} str String with unescaped HTML characters
                 **/
                function _encode(str) {
                    encoded = String(str)
                        .replace(/&/g, '&amp;')
                        .replace(/</g, '&lt;')
                        .replace(/>/g, '&gt;')
                        .replace(/"/g, '&quot;');

                    return encoded;
                }

                /**
                 * Converts an html characterSet into its original character.
                 *
                 * @param {String} str htmlSet entities
                 **/
                function _decode(str) {
                    decoded = String(str)
                        .replace(/&amp;/g, '&')
                        .replace(/&lt;/g, '<')
                        .replace(/&gt;/g, '>')
                        .replace(/&quot;/g, '"');

                    return decoded;
                }


                /**
                 * Return namespace-declaration
                 */
                return {
                    encode: _encode,
                    decode: _decode

                }
            }(),
            selectedText: function () {
                buggy.message(arguments, "init selectedText");

                /**
                 * Returns the selected string in the editable-content-area
                 * @returns {string}
                 */
                function _getSelection() {
                    // todo: do a check, if selected string is in editablecontent and not everywhere in the dom....
                    let isEditableContent = false;
                    let selection = window.getSelection();

                    if (currentTextField === selection.anchorNode.parentElement) {
                        isEditableContent = true;
                    }
                    if (isEditableContent) {
                        return selection;
                    } else {
                        false;
                    }
                }

                /**
                 * surrounds string with tag.
                 *
                 * Has a additional selected text-manipulation for the selected Text
                 * @param str
                 * @param tag
                 */
                function _surroundWithTag(tag) {
                    if (_getSelection() === false) {
                        return;
                    }
                    let selectedText = _getSelection().toString();
                    let surroundedText = "&lt;" + tag + "&gt;" + selectedText + "&lt;/" + tag + "&gt;";

                    replaceSelectedText(surroundedText);
                    _parseText();

                    /**
                     * source: https://stackoverflow.com/questions/3997659/replace-selected-text-in-contenteditable-div
                     * @param replacementText
                     */
                    function replaceSelectedText(replacementText) {
                        let sel, range;
                        if (_getSelection()) {
                            sel = _getSelection();
                            if (sel.rangeCount) {
                                range = sel.getRangeAt(0);
                                range.deleteContents();
                                range.insertNode(document.createTextNode(replacementText));
                            }
                        } else if (document.selection && document.selection.createRange) {
                            range = document.selection.createRange();
                            range.text = replacementText;
                        }
                    }
                }

                /**
                 * Return namespace-declaration
                 */
                return {
                    getSelection: _getSelection,
                    surroundWithTag: _surroundWithTag

                }
            }()
        }
    };

    /**
     * return namespace-declaration
     */
    return {
        Manipulator: Manipulator,
        init: (function (config) {
            _init(config)
        })
    }
}


/**
 * easy debugger
 * @constructor
 */
function Buggy() {
    console.log("Buggy enabled");
    let that = this;

    function _getCurrentNameByArgument(args) {
        let myName = args.callee.toString();
        myName = myName.substr('function '.length);
        myName = myName.substr(0, myName.indexOf('('));
        return myName;
    }

    function _message(args) {
        let argumentArray = Array.from(arguments);
        if (argumentArray.length) {

            let outputArray = [];
            for (let i = 1; i < arguments.length; i++) {
                outputArray.push(arguments[i]);
            }
            console.log(_getTimeHHMMSSMS(), _getCurrentNameByArgument(arguments[0]) + ": ", outputArray);
        }
    }

    function _getTimeHHMMSSMS() {
        date = new Date();
        hh = date.getHours()
        mm = date.getMinutes();
        ss = date.getSeconds();
        ms = date.getMilliseconds();
        return (hh + ":" + mm + ":" + ss + "." + ms);
    }

    return {
        message: _message,
    }
}