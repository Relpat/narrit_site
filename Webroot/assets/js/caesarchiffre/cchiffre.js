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
    }

    function _parseText() {
        _readTextField();
        let currentText = _getCurrentText();
        let decodedText = Manipulator.htmlentities.decode(currentText);
        currentTextField.innerHTML = decodedText;
    };

    function _init(config) {
        editForm = config.editForm;

        // make html-content editable
        $(".cchiff-editable").attr("contenteditable", true);

        userInteractive();
        createInteractiveMenu();

        function userInteractive() {
            let editFields = document.querySelectorAll(".cchiff-editable");
            for (let element of editFields) {
                element.addEventListener("click", function (index, data) {
                    currentTextField = this;
                    _readTextField();
                });
            }
        }

        function createInteractiveMenu() {
            let mainMenu = $("<div/>", {
                "class": "position-fixed float-right",
                "role": "group"
            }).css({
                "top": "120px",
                "right": "60px"
            })
            createElementButtons();
            // createHeadlines();
            $(editForm).append(mainMenu);

            /**
             * create the Buttons
             */
            function createElementButtons() {
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
                    "unterline": {
                        config: {
                            "class": "btn btn-primary text-action-button",
                            "data-action-type": "u",
                            "text": "Underline",
                        },
                        action: {
                            "click": (function () {
                                Manipulator.selectedText.surroundWithTag("u")
                            })
                        }
                    },
                    "sup": {
                        config: {
                            "class": "btn btn-primary text-action-button",
                            "data-action-type": "u",
                            "text": "Hochstellen",
                        },
                        action: {
                            "click": (function () {
                                Manipulator.selectedText.surroundWithTag("sup")
                            })
                        }
                    },
                };

                let buttonGroup = $("<div/>", {
                    "class": "btn-group-vertical float-right button-group-font-style",
                    "role": "group"
                });
                /**
                 * add buttons
                 */
                for (let buttontype in buttonsConfig) {
                    let button = $("<button/>", buttonsConfig[buttontype].config);
                    $(button).on(buttonsConfig[buttontype].action);
                    buttonGroup.append(button);
                }

                mainMenu.append(buttonGroup);
            }

            function createHeadlines(){
                let texttypeConfig = {
                "h1": {
                    config: {
                        "class": "btn btn-primary text-action-button",
                            "data-action-type": "h1",
                            "text": "h1",
                    },
                    action: {
                        "click": (function () {
                            Manipulator.selectedText.surroundWithTag("h1")
                        })
                    }
                },
                "h2": {
                    config: {
                        "class": "btn btn-primary text-action-button",
                            "data-action-type": "h2",
                            "text": "h2",
                    },
                    action: {
                        "click": (function () {
                            Manipulator.selectedText.surroundWithTag("h2")
                        })
                    }
                },
                "h3": {
                    config: {
                        "class": "btn btn-primary text-action-button",
                            "data-action-type": "h3",
                            "text": "h3",
                    },
                    action: {
                        "click": (function () {
                            Manipulator.selectedText.surroundWithTag("h3")
                        })
                    }
                    }
                };


                let buttonGroup = $("<div/>", {
                    "class": "btn-group-vertical float-right button-group-headlines",
                    "role": "group"
                });

                /**
                 * add buttons
                 */
                for (let buttontype in texttypeConfig) {
                    let button = $("<button/>", texttypeConfig[buttontype].config);
                    $(button).on(texttypeConfig[buttontype].action);
                    buttonGroup.append(button);
                }
                mainMenu.append(buttonGroup);
            }
        }
    }

    let Manipulator = new _Manipulator();

    function _Manipulator() {
        let that = this;
        return {
            htmlentities: function () {

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

                /**
                 * Returns the selected string in the editable-content-area
                 * @returns {string}
                 */
                function _getSelection() {
                    // todo: do a check, if selected string is in editablecontent and not everywhere in the dom....
                    let isEditableContent = false;
                    let selection = window.getSelection();

                    if (currentTextField.contains(selection.anchorNode.parentElement) || currentTextField === selection.anchorNode.parentElement) {
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
                    if (typeof _getSelection() !== "object") {
                        return;
                    }
                    let selectedText = _getSelection().toString();
                    let clearedText = findTagAndRemoveIt(selectedText,tag);
                    let surroundedText = "&lt;" + tag + "&gt;" + clearedText + "&lt;/" + tag + "&gt;";

                    buggy.message(arguments, "selectedText", selectedText);
                    buggy.message(arguments, "clearedText", clearedText);
                    buggy.message(arguments, "surroundedText", surroundedText);

                    replaceSelectedText(surroundedText);
                    _parseText();

                    /**
                     * removes the tag in the selected replacement string
                     * @param replacementText
                     * @param tag
                     */
                    function findTagAndRemoveIt(replacementText, tag) {
                        let decoded = Manipulator.htmlentities.decode(replacementText);

                        let tagBegin = new RegExp("&lt;" + tag + "&gt;", "g");
                        let tagEnd = new RegExp("&lt;" + tag + "&gt;", "g");

                        return String(decoded)
                            .replace(tagBegin, '')
                            .replace(tagEnd, '');
                    }

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
