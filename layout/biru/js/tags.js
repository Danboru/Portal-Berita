(function ($) {
    $.fn.extend({
        tag: function () {
            var defaults = {
                width: 400,
                height: 90,
                inputName: 'tags'
            };
            var attr = arguments[0] || {};
            if (typeof (attr.width) === "undefined") {
                attr.width = defaults.width
            }
            if (typeof (attr.height) === "undefined") {
                attr.height = defaults.height
            }
            if (typeof (attr.inputName) === "undefined") {
                attr.inputName = defaults.inputName
            }
            this.each(function () {
                var $this = $(this);
                $this.addClass('tag_form');
                $this.css({
                    width: attr.width,
                    height: attr.height
                });
                $('<input type="text" value="" name="add_tag" placeholder="Add tag" class="new_tag_input" onkeydown="if(event.keyCode == 13) { return false; }" />').focus(function () {
                    $this.addClass('focus')
                }).blur(function () {
                    $this.removeClass('focus')
                }).keydown(function (e) {
                    var key = e.which,
                        box = $(this),
                        val = box.val();
                    if (key == 8) {
                        if (val.length == 0) {
                            $this.removeTag()
                        }
                    }
                }).keyup(function (e) {
                    var key = e.which,
                        box = $(this),
                        val = box.val();
                    if (key == 13 || key == 188) {
                        $this.addTag(val);
                        box.val('')
                    }
                }).appendTo($this);
                $this.click(function () {
                    $this.children('.new_tag_input').focus()
                });
                $('<input type="hidden" value="a:0:{}" class="tags_array" name="' + attr.inputName + '" />').appendTo($this)
            });
            return this
        },
        addTag: function (value) {
            var $this = $(this);
            value = value.replace(/,/g, '');
            if (value.length == 0 || value == ',') {
                return
            }
            value = value.replace(/^\s+|\s+$/g, "");
            $('<div class="tag">' + value + '</div>').insertBefore($this.children('.new_tag_input'));
            $this.updateTagsArray();
            return $this
        },
        removeTag: function () {
            var $this = $(this);
            $this.children('.tag:last').remove();
            $this.updateTagsArray();
            return $this
        },
        updateTagsArray: function () {
            var $this = $(this);
            var tags = [];
            $this.children('.tag').each(function () {
                tags.push($(this).html())
            });
            $this.children('.tags_array').val((serialize_javascript_array(tags)));
            return $(this)
        }
    });

    function serialize_javascript_array(a) {
        var a_php = "",
            total = 0;
        for (var key in a) {
            ++total;
            a_php = a_php + "s:" + String(key).length + ":\"" + String(key) + "\";s:" + String(a[key]).length + ":\"" + String(a[key]) + "\";"
        }
        a_php = "a:" + total + ":{" + a_php + "}";
        return a_php
    }
})(jQuery);