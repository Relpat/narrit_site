
/**
 * easy debugger
 * @constructor
 */
function Buggy() {
    this.enableTraceOnce = false;
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

            let groupName = "";
            if(typeof arguments[1] === "string"){
                groupName = arguments[1];
            }else{
                groupName = _getCurrentNameByArgument(arguments[0])
            }
            console.groupCollapsed(groupName,", "+ _getTimeHHMMSSMS());

            console.log( outputArray);

            if(that.enableTraceOnce || that.enableTrace){
                console.trace()
                if(that.enableTraceOnce){
                    that.enableTraceOnce = false;
                }
            }
            console.groupEnd();
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

    function _enableDebugTraceOnce (){
        that.enableTraceOnce = true;
    }

    return {
        message: _message,
        enableDebugTraceOnce : _enableDebugTraceOnce
    }
}