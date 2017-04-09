//var m="tuanmjnh";
//!function($) {
//    "use strict";
//    var tm = {
//        name: "tuanmjnh",
//        age: "25"
//    }
//    $.tm=new Object();
//}(jQuery);
+function($) {
    'use strict';
    var ZTM = function(element, options) {
        this.$element = $(element)
        this.options = options
        this.action = true
        this.str =
                this.name = null
//        this.options.pause == 'hover' && this.$element
//      .on('mouseenter', $.proxy(this.pause, this))
//      .on('mouseleave', $.proxy(this.cycle, this))
    }
    ZTM.DFS = {
        action: true,
        str: "Xin chào ",
        name: "Minh Tuấn"
    }
    ZTM.prototype.getDFS = function() {
        return ZTM.DFS
    }
    ZTM.prototype.msg = function() {
        if (this.action)
            alert(this.str + this.name)
    }
    ZTM.prototype.clicked = function() {

    }

    var old = $.fn.ztm
    $.fn.ztm = function(option) {
//        return this.each(function() {
//            var $this = $(this)
//            var data = $this.data('bs.ztm')
//            var options = typeof option == 'object' && option
//
//            if (!data && option == 'destroy')
//                return
//            if (!data)
//                $this.data('bs.ztm', (data = new ZTM(this, options)))
//            if (typeof option == 'string')
//                data[option]()
//        })
        return this.each(function() {
            var $this = $(this)
            var data = $this.data('bs.ztm')
            var options = $.extend({}, ZTM.DFS, $this.data(), typeof option == 'object' && option)

            //if (!data && options.toggle && option == 'show')
            //option = !option
            if (!data)
                $this.data('bs.ztm', (data = new ZTM(this, options)))
            if (typeof option == 'string')
                data[option]()
        })
    }
    $.fn.ztm.Constructor = ZTM
    $.fn.ztm.noConflict = function() {
        $.fn.ztm = old
        return this
    }

//    $(document).on('click.bs.ztm.data-api', '[datas^=ztm]', function(e) {
//        var $btn = $(e.target)
//        $btn.ztm('msg')
//        e.preventDefault()
//    })
}(jQuery);

+function($) {
    'use strict';
    $.fn.ztm2 = function(options) {
        var option={action:true,str: "Xin chào ",name: "Minh Tuấn"};
        $.extend(option,options);
        return $(this).each(function (){
            if(option.action)
                alert(option.str + option.name);
        })
    }
}(jQuery);