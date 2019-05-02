
/**
 * easy debugger
 * @constructor
 */
function Buggy() {
    this.enableTrace = false;
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
            console.log("-----------------------------------------------------[Time: "+_getTimeHHMMSSMS()+"]");
            console.log( outputArray);
            if(that.enableTrace){
                console.trace()
                that.enableTrace = false;
            }
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

    function _enableDebugTrace (){
        that.enableTrace = true;
    }

    return {
        message: _message,
        enableDebugTrace : _enableDebugTrace
    }
}