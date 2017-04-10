$.fn.smartSearch = function (options) {

    var _q = $(this),
        _f = $(this).parents('form'),
        _c = $(options.result),
        _this = {
            running: false,
            cache: [],
            cache_k: '',
            old_value: ''
        },
        _opt = options;

    _f.on('submit', function (e) {
        e.preventDefault();
        location.href = _opt.catalogFolder + '?q=' + _q.val();

    });

    _q.on('getResult', function () {

        var q = _q.val();

        if (q.length < 3) return false;

        if (_this.running || _this.old_value == q) return false;

        _this.cache_k = _q.attr('name') + '|' + q;

        if (_this.cache[_this.cache_k] == null) {

            _this.running = true;

            if(iblock_search_input_section_id !== undefined){
                request_section_id = $('#'+iblock_search_input_section_id).val();
                //console.log(request_section_id);
            }else{
                request_section_id = 0;
            }

            $.ajax({
                type: "POST",
                url: _opt.dataProvider,
                data: {
                    ajax_search: 'y',
                    with_names: 'y',
                    section_id: request_section_id,
                    q: $(this).val(),
                    INPUT_ID: _opt.input_id
                },
                success: function (result) {

                    _q.trigger('showResult', [result]);
                    _this.cache[_this.cache_k] = result;
                    _this.running = false;

                    if(q !== _q.val())
                        _q.trigger('getResult');

                },
                dataType: 'json'
            });
        }
        else {
            _q.trigger('showResult', _this.cache[_this.cache_k]);
        }

    }).on('showResult', function (e, data) {

        if (typeof $.render === 'undefined') {
            console.error('$.render is not installed');
            return;
        }
        if (data.SECTIONS.length > 0 || data.ELEMENTS.length > 0) {

            _c.html($('#' + _opt.jsTemplate).render(data));
            _c.addClass('open');

        } else if (_c.hasClass('open')) {
            _c.removeClass('open');
        }
        ;

    }).on('keyup', function () {

        if (_q.val().length < 3) {
            _c.removeClass('open');
            return false;
        }

        setTimeout(function () {
            _q.trigger('getResult');
        }, 50);

    }).on('focusout', function (e) {


    }).on('focus', function () {
        if (_q.val() !== '' && _c.children().length > 0)
            _c.addClass('open');
    });

    $('body').click(function (e) {
        if ($(e.target).parents(options.result).length == 0) {
            _c.removeClass('open');
        }
    });
}