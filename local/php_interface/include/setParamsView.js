/**
 * Created by Евгений on 22.03.2017.
 */


var propView = function(){
   this.propTree = {};
   this.popup = {};
   this.lpTable = {};
   this.propId = -1;
   this.select = {};


   this.init();
   this.selCtrl();
   this.initHtml();
   this.domMpltn();
};

propView.prototype.findOne = function (haystack, arr) {
    return arr.some(function (v) {
        return haystack.indexOf(v) >= 0;
    });
};
propView.prototype.init = function () {
    var $this = this;
    var data = {};

    this.propTree = jQuery('#cedit1_edit_table');

    this.popup =  new BX.PopupWindow("my_answer", null, {
        content: '<div id="setValueCont"><input id="newValue" value="" type="text"></div>',
        closeIcon: {right: "20px", top: "10px"},
        titleBar: {content: BX.create("span", {html: '<b>Название</b>', 'props': {'className': 'access-title-bar'}})},
        zIndex: 0,
        offsetLeft: 0,
        offsetTop: 0,
        draggable: {restrict: false},
        buttons: [
            new BX.PopupWindowButton({
                text: "Добавить",
                className: "popup-window-button-accept",
                events: {click: function(){
                    var popup = this;
                    var $propId = $this.propId;
                    data[$propId] = BX('newValue').value;
                    BX.ajax({
                        url: '/ajax/set_prop_value.php',
                        method: 'POST',
                        data: data,
                        dataType: 'json',
                        timeout: 60,
                        async: true,
                        processData: true,
                        scriptsRunFirst: false,
                        emulateOnload:false,
                        start: true,
                        cache: false,
                        onsuccess: function (data) {
                            $this.select.append('<option value="'+data['Props']['ID']+'">'+data['Props']['VALUE']+'</option>');
                            var select = $this.getSelect(data['name']);
                            select.val(data['Props']['ID']);
                            popup.popupWindow.close();
                        },
                        onfailure: function (data) {

                        }
                    });


                }}
            }),
            new BX.PopupWindowButton({
                text: "Закрыть",
                className: "webform-button-link-cancel",
                events: {click: function(){
                    this.popupWindow.close(); // закрытие окна
                }}
            })
        ]
    });
};
propView.prototype.selCtrl = function () {
    var $selects = this.propTree.find('select');
    var popup = this.popup;
    var $this = this;
    $selects.change(function (e) {
        $this.select = jQuery(this);
        if(e.target.value === 'setValue'){
            $this.propId = e.target.name;
            popup.show();
        }
    })
};
propView.prototype.getSelect = function (name) {
  return this.propTree.find('select[name="'+name+'"]')
};
propView.prototype.initHtml = function () {

    this.propTree.after('<table style="display: none;" class="'+this.propTree.attr('class')+'" id="low-priority"> </table>');
    this.propTree.after('<div class="clickable-custom"><button class="hide">Показать остальные свойства</button></div>');
    this.lpTable = jQuery('#low-priority');
    var lpTable = this.lpTable;

    jQuery('.clickable-custom').click(function (e) {
        e.preventDefault();
        if($(this).find('button').hasClass('hide')){
            $(this).find('button').text('Скрыть остальные свойства').removeClass('hide').addClass('shown');
        } else{
            $(this).find('button').text('Показать остальные свойства').removeClass('shown').addClass('hide');
        }
        lpTable.slideToggle();
    });

};
propView.prototype.domMpltn = function () {
    var lpTable = this.lpTable;
    this.propTree.find('tbody').children().each(function () {
        var $select = $(this).find('select');
        if($select.attr('multiple') !== 'multiple' ){
            $(this).find('select').prepend('<option value="setValue" id="setValue">Установить значение</option>');
        }
        var name = ($(this).find('.adm-detail-valign-top').text());
        name = $.trim(name);
        name = name.substring(0, name.length - 1); // remove last :
        if(propNames.indexOf(name)===-1){
            if(propNames.length>0) {
                lpTable.append($(this));
            }
        }
    });
};


BX.ready(function () {
    if(propNames.length>0) {
        new propView();
    }
});






