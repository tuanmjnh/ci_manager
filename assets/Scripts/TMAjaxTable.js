+(function ($) {
    var DF = {
        url: window.location.pathname,
        EditAjax: false,
        QuickEdit: false,
        CheckBox: true,
        NumberRow: true,
        Command: true,
        urlRow: false,
        Footer: false,
        Status: 1,
        urlData: 'data',
        urlList: 'list',
        urlDetails: 'details',
        urlDelete: 'delete',
        urlInsert: 'insert',
        urlUpdate: 'updateStatus',
        urlDataDetails: 'dataDetails',
        //CMD
        icEdit: 'btn btn-warning glyphicon glyphicon-edit p2',
        icRecover: 'btn btn-info glyphicon glyphicon-repeat p2',
        icDel: 'btn btn-danger glyphicon glyphicon-remove p2',
        icTrash: 'btn btn-danger glyphicon glyphicon-minus-sign p2',
        //Table
        TMDTHead: '.TMDT-Head',
        TMDTBody: '.TMDT-Body',
        TMDTFoot: '.TMDT-Foot',
        //Status
        SShow: '#showing',
        STrash: '#trash',
        SAll: '#all',
        //TableHead
        Record: true,
        RecordBS: true,
        RecordList: [10, 25, 50, 100, 200],
        RecordText: 'Show {0} Records',
        RecordTitle: 'Show {0} Records',
        Limit: 10,
        //Search
        Search: true,
        SearchText: 'Search',
        SearchKey: '',
        //Orther data
        orther: '',
        //Page
        PPage: 1,
        PTotalPage: 1,
        POffset: 1,
        PCount: 1,
        PTotalCount: 1,
        PPagination: 'pagination',
        PPrewText: 'Preview',
        PNextText: 'Next',
        //Information
        InfText: 'Display {0} To {1} Of {2} Records',
        //Confirm
        CTitleText: 'title',
        COkText: 'Ok',
        CCancelText: 'Cancel',
        fncConfirm: null,
        //Button Delete All
        btnDelAll: '#btnDelAll',
        btnTrashAll: '#btnTrashAll',
        btnTrashText: 'Delete checked',
        btnRecoverText: 'Recover checked'
    }
//    var TMDT = function (el) {
//        $(el).on('click', dismiss, this.close)
//    }
    var old = $.fn.TMDT;
    $.fn.TMDT = function (op) {
        //$.extend(DF, op);
        return $(this).each(function (e) {
            var $this = this;
            //var data = $this.data;
            //var options = $.extend({}, TMTest.DEFAULTS, $this.data(), typeof option == 'object' && option)
            var data = new TMDT(this, op);
            DataChange(this, op);
            PaginationAction(this, op);
            StatusAction(this, op);
            Refresh(op);
            $($(this).find(DF.TMDTHead)).html(tableHead);
            //ActionDelete(isthis);
//            $(document).ajaxStart(function () {
//                $('#ajaxLoadTM').html('<img src="' + $('#ajaxLoadTM').attr('url') + 'assets/loading/load1.gif"/>');
//            });
            $(document).ajaxComplete(function () {
                UpdateStatusAction($this);
                DeleteAction($this);
                btnAction();
                CSSTMDT();
                //$.fn.delAjaxTableTM(DF.urlDelete);
                //$.fn.delAjaxAllTableTM(DF.urlDelete, '.checkAll', '.checkitem');
                //$('#ajaxLoadTM').html('');
//                if (DF.EditAjax) {
//                    $.fn.btnCreate();
//                    if (DF.QuickEdit) {
//                        $.fn.editQuickClick();
//                    } else {
//                        $.fn.btnUpdate();
//                    }
//                }
            });
        });
    };

    function CSSTMDT() {
        $(DF.TMDTBody).find('table tbody tr').first().find('td').each(function () {
            var css = $(this).children().attr('th-css');
            var index = '';
            if (css != undefined) {
                index = $(this).index();
                $($(DF.TMDTBody).find('table thead tr th')[index]).addClass(css);
            }
        });
        $(DF.TMDTBody).find('table tbody tr').find('td').each(function () {
            var css = $(this).children().attr('td-css');
            if (css != undefined) {
                $(this).addClass($(this).children().attr('td-css'));
            }
        });
    }
    function Refresh(op) {
        $(document).on('click', '.TMDT-Refresh', function () {
            TMDT($(this).attr('TMDT-Refresh'), op);
        });
        $(document).on('change', '.TMDT-Change-Refresh', function () {
            TMDT($(this).attr('TMDT-Change-Refresh'), op);
        });
    }
    function DataChange(obj, op) {
        $(document).on('change', '.' + obj.className + ' #limit', function () {
            DF.Limit = $(this).val();
            TMDT(obj, op);
        });
        $(document).on('click', '.' + obj.className + ' .limit', function (e) {
            e.preventDefault();
            DF.Limit = $(this).attr('value');
            $(this).parent().parent().prev()
                    .html(DF.RecordText.StringFormat(DF.Limit) + ' <span class="caret"></span>')
                    .attr('title', DF.RecordTitle.StringFormat(DF.Limit));
            TMDT(obj, op);
        });
        $(document).on('change', '.' + obj.className + ' .data-change', function () {
            DF.orther = '';
            DF.orther += ('&' + $(this).attr('name') + '=' + $(this).attr('value'));
            TMDT(obj, op);
        });
        $(document).on('click', '.' + obj.className + ' .data-click', function () {
            DF.orther = '';
            DF.orther += ('&' + $(this).attr('name') + '=' + $(this).attr('value'));
            TMDT(obj, op);
        });
        $(document).on('change', '.data-main-change', function () {
            DF.orther = '';
            DF.orther += ('&' + $(this).attr('name') + '=' + $(this).attr('value'));
            TMDT(obj, op);
        });
        $(document).on('click', '.data-main-click', function () {
            DF.orther = '';
            var val = $(this).attr('value').split('|');
            for (var i = 0; i < val.length; i++)
                DF.orther += ('&' + val[i]);
//            console.log(DF.orther);
            TMDT(obj, op);
        });
        $(document).on('keyup', '.' + obj.className + ' .TMDTSearch', function () {
            DF.SearchKey = $(this).val();
            TMDT(obj, op);
        });
    }
    function StatusAction(obj, op) {
        $(document).on('click', '.' + obj.className + ' ' + DF.SShow, function () {
            $(document).find(DF.SShow).addClass('btn-primary');
            $(document).find(DF.STrash).removeClass('btn-primary');
            //$('#all').removeClass('btn-primary');
            //$('#btnDelAll')
            //        .html($('#btnDelAll').attr('delete'))
            //        .removeClass('btn-info')
            //        .addClass('btn-danger')
            //        .hide();
            DF.Status = 1;
            DF.PPage = 1;
            TMDT(obj, op);
        });
        $(document).on('click', '.' + obj.className + ' ' + DF.STrash, function () {
            $(document).find(DF.SShow).removeClass('btn-primary');
            $(document).find(DF.STrash).addClass('btn-primary');
            //$('#all').removeClass('btn-primary');
            //$('#btnDelAll')
            //        .html($('#btnDelAll').attr('recover'))
            //        .removeClass('btn-danger')
            //        .addClass('btn-info')
            //        .hide();
            DF.Status = 0;
            DF.PPage = 1;
            TMDT(obj, op);
        });
        //$('#all').click(function () {
        //    $('#true').removeClass('btn-primary');
        //    $('#false').removeClass('btn-primary');
        //    $('#all').addClass('btn-primary');
        //    $('#btnDelAll').hide();
        //    $.fn.TMDT(DF.urlData);
        //});
    }
    //Table
    var TMDT = function (obj, op) {
        $.extend(DF, op);
        var csrf = 'csrf_token_name=' + $.cookie('csrf_cookie_name');
        var stt = '&stt=' + DF.Status;
        var limit = '&limit=' + DF.Limit;
        var page = '&page=' + DF.PPage;
        var SearchKey = DF.SearchKey !== '' ? '&searchKey=' + DF.SearchKey : '';
        var rs = null;
//        var orther = [];
//        $(document).on('change', '.data-change', function () {
//            orther.push('&' + $(this).attr('name') + '=' + $(this).attr('value'));
//        });
//        $(document).on('click', '.data-click', function () {
//            orther.push('&' + $(this).attr('name') + '=' + $(this).attr('value'));
//        });
        //console.log(obj);
        $.post(DF.url + '/' + DF.urlData, csrf + stt + limit + page + DF.orther + SearchKey, function (json) {
            DF.PPage = json.PageData.Page;
            DF.PTotalPage = json.PageData.TotalPage;
            DF.POffset = json.PageData.Offset + 1;
            DF.PCount = json.PageData.Count + json.PageData.Offset;
            DF.PTotalCount = json.PageData.TotalCount;
            rs = json;
            $(obj).find(DF.TMDTBody).html(tableBody(json));
            $(obj).find(DF.TMDTFoot).html(tableFoot());
        }, 'json');
        return rs;
    };
    function tableHead() {
        var records = '';
        for (var i = 0; i < DF.RecordList.length; i++)
            records += '<li><a href="#" class="limit" value="' + DF.RecordList[i] + '" title="' + DF.RecordTitle.StringFormat(DF.RecordList[i]) + '">' +
                    DF.RecordText.StringFormat(DF.RecordList[i]) + '</a></li>';
        if (DF.RecordBS)
            records = '<div id="limit" class="dropdown pull-left">' +
                    '<a href="#" class="btn btn-info dropdown-toggle" data-toggle="dropdown" title="' + DF.RecordTitle.StringFormat(DF.Limit) + '">' +
                    DF.RecordText.StringFormat(DF.Limit) + ' <span class="caret"></span></a>' +
                    '<ul class="dropdown-menu dropdown-menu-none">' + records + '</ul></div>';
        else
            records = '<div class=""><div class="dataTables_length"><label>' +
                    '<select id="limit" class="form-control input-sm">' +
                    '<option value="10">10</option>' +
                    '<option value="25">25</option>' +
                    '<option value="50">50</option>' +
                    '<option value="100">100</option>' +
                    '</select></label></div></div>';

        var search = '<div class="searchTable"><div class="dataTables_filter"><label class="pull-right">' +
                ' <input class="form-control input-sm TMDTSearch" placeholder="' + DF.SearchText + '" type="search" aria-controls="datatable"></input>' +
                '</label></div></div>';
        return records + search;
    }
    ;
    function tableBody(json) {
        var sTable = $('<table class="table table-striped table-bordered table-hover" id="datatable"></table>');
        var thead = $('<thead></thead>').append(getTHead(json.thead));
        var tfoot = DF.Footer ? $('<tfoot></tfoot>').append(getTHead(json.thead)) : null;
        var tbody = $('<tbody></tbody>');
        $.each(json.tbody, function (j) {
            var valtd = DF.NumberRow ? '<td class="center">' + (j + DF.POffset) + '</td>' : '';
            $.each(json.tbody[j], function (k) {
                (k !== 'id' && k !== 'stt') ? valtd += getTD(json.tbody[j].id, json.tbody[j][k], DF.urlDetails) : null;
            });
            valtd += DF.Command ? getCmd(json.tbody[j].id, DF.url + '/' + DF.urlDetails, json.tbody[j].stt) : '';
            valtd += DF.CheckBox ? '<td class="center"><input type="checkbox" class="checkitem" value="' + json.tbody[j].id + '"></td>' : '';
            tbody.append('<tr>' + valtd + '</tr>');
        });
        return sTable.append(thead, tbody, tfoot);
    }
    ;
    function tableFoot() {
        var row = $('<div class="row"></div>');
        var info = '<div class="pull-left dataTables_info">' + DF.InfText.StringFormat(['<b>' + DF.POffset + '</b>', '<b>' + DF.PCount + '</b>', '<b>' + DF.PTotalCount + '</b>']) + '</div>';
        var page = '<div class="pull-right pagination">' + Pagination() + '</div>';
        return info + page;
    }
    ;
    function getTHead(json) {
        var checkbox = DF.CheckBox ? '<th class="w20 center"><input type="checkbox" class="checkAll"></th>' : '';
        var number = DF.NumberRow ? '<th class="tableCmd center">#</th>' : '';
        var cmd = DF.Command ? '<th class="w60 center">#</th>' : '';
        var dataHead = '';
        $.each(json, function (j) {
            dataHead += '<th>' + json[j] + '</th>';
        });
        return $('<tr></tr>').append(number, dataHead, cmd, checkbox);
    }
    ;
    function getTD(id, value, url) {
        return DF.urlRow ?
                '<td style="cursor:pointer" onclick="window.location=\'' + url + '/' + id + '\'">' + value + '</td>' :
                '<td>' + value + '</td>';
    }
    ;
    function getCmd(json, url, stt) {
        var confirm = 'data-title="' + DF.CTitleText + '" ';
        confirm += 'data-btnOkLabel="' + DF.COkText + '" ';
        confirm += 'data-btnCancelLabel="' + DF.CCancelText + '"';

        var edit = '';
        if (stt == '0')
            edit = 'recover ' + DF.icRecover;
        else
            edit = 'edit ' + DF.icEdit;
        edit = '<a value="' + json + '" class="' + edit + '" href="' +
                (url !== '' && url !== undefined ? url + '/' + json : '#') + '" ' + confirm + '></a>';

        var del = '';
        if (stt == '0')
            del = 'delete ' + DF.icDel;
        else
            del = 'trash ' + DF.icTrash;
        del = '<a value="' + json + '" href="#" ' + 'class="' + del + '" ' + confirm + '></a>';
        return '<td class="center btn-cmd">' + edit + del + '</td>';
    }
    ;
    function Pagination() {
        var limit = 4;
        var start = ((DF.PPage - Math.ceil(limit / 2) <= 0) ? 1 : DF.PPage - Math.ceil(limit / 2)) + 1;
        var sides = DF.PPage + Math.ceil(limit / 2);
        var sli = '<li><a class="linkPage" href="#">';
        var slia = '<li class="active"><a class="linkPage" href="#">';
        var eli = '</a></li>';
        var prev = (DF.PPage === 1) ? 'disabled' : '';
        prev = '<li class="' + prev + '"><a class="prev" href="#">' + DF.PPrewText + '</a></li>';
        //'<li class="paginate_button disabled"><a class="prev" href="#">&laquo;</a></li>' :
        //'<li class="paginate_button"><a class="prev" href="#">&laquo;</a></li>';
        var next = (DF.PPage === DF.PTotalPage || DF.PTotalPage === 0) ? 'disabled' : '';
        next = '<li class="' + next + '"><a class="next" href="#">' + DF.PNextText + '</a></li>';
        //'<li class="paginate_button disabled"><a class="next" href="#">&raquo;</a></li>' :
        //'<li class="paginate_button"><a class="next" href="#">&raquo;</a></li>';

        var ellipsis = '<li class="disabled"><a href="javascript:;">...</a></li>';
        var pagination = prev;
        if (DF.PTotalPage < limit) {
            for (var i = 1; i <= DF.PTotalPage; i++) {
                pagination += (i === DF.PPage ? slia : sli) + i + eli;
            }
        } else {
            pagination += (i === DF.PPage ? slia : sli) + 1 + eli;
            for (var i = start; i < DF.PTotalPage; i++) {
                (start > 2 && i === start) ? pagination += ellipsis : null;
                if (DF.PPage < 4) {
                    (i < sides + (4 - DF.PPage)) ? pagination += (i === DF.PPage ? slia : sli) + i + eli : ((i === sides + (4 - DF.PPage)) ? pagination += ellipsis : null);
                } else {
                    (i < sides) ? pagination += (i === DF.PPage ? slia : sli) + i + eli : ((i === sides) ? pagination += ellipsis : null);
                }
            }
            (DF.PTotalPage > 1) ? pagination += (i === DF.PPage ? slia : sli) + DF.PTotalPage + eli : null;
        }
        pagination += next;
        pagination = '<ul class="pagination">' + pagination + '</ul>';
        return pagination;
    }
    ;
    function PaginationAction(obj, op) {
        $(DF.btnDelAll).hide();
        $(document).on('click', '.' + obj.className + ' .pagination .prev', function (e) {
            e.preventDefault();
            if (DF.PPage > 1) {
                DF.PPage -= 1;
                TMDT(obj, op);
            }
        });
        $(document).on('click', '.' + obj.className + ' .pagination .next', function (e) {
            e.preventDefault();
            if (DF.PPage < DF.PTotalPage) {
                DF.PPage += 1;
                TMDT(obj, op);
            } else
                $(this).addClass('disabled');
        });
        $(document).on('click', '.' + obj.className + ' .pagination .linkPage', function (e) {
            e.preventDefault();
            DF.PPage = parseInt($(this).html());
            TMDT(obj, op);
        });
    }
    function UpdateStatusAction(obj, op) {
        $(document).find('.' + obj.className + ' .trash').confirmation({
            onConfirm: function (e, a) {
                var data = {
                    id: a.attr('value'),
                    flag: 0,
                    csrf_token_name: $.cookie('csrf_cookie_name')
                };
                $.post(DF.url + '/' + DF.urlUpdate, data, function () {
                    a.parent().parent().fadeOut('slow', function () {
                        $(this).remove();
                        TMDT(obj, op);
                    });
                });
            }
        });
        $(document).find('.' + obj.className + ' .recover').confirmation({
            onConfirm: function (e, a) {
                var data = {
                    id: a.parent().find('.delete').attr('value'),
                    flag: 1,
                    csrf_token_name: $.cookie('csrf_cookie_name')
                };
                $.post(DF.url + '/' + DF.urlUpdate, data, function () {
                    a.parent().parent().fadeOut('slow', function () {
                        $(this).remove();
                        TMDT(obj, op);
                    });
                });
            }
        });
    }
    function DeleteAction(obj, op) {
        $(document).find('.' + obj.className + ' .delete').confirmation({
            onConfirm: function (e, a) {
                var data = {
                    id: a.attr('value'),
                    csrf_token_name: $.cookie('csrf_cookie_name')
                };
                $.post(DF.url + '/' + DF.urlDelete, data, function () {
                    a.parent().parent().fadeOut('slow', function () {
                        $(this).remove();
                        TMDT(obj, op);
                    });
                });
            }
        });
    }
    function btnAction() {
        $(DF.btnTrashAll).hide();
        $(DF.btnDelAll).hide();
        UpdateStatusAll();
        if (DF.Status === 1) {
            DF.btnDelAll = $(DF.btnDelAll);
            $(DF.btnDelAll).remove();
            $(DF.btnTrashAll).removeClass('btn-info').addClass('btn-danger').html(DF.btnTrashText);
        } else {
            $(DF.btnTrashAll).removeClass('btn-danger').addClass('btn-info').html(DF.btnRecoverText);
            $(DF.btnTrashAll).after(DF.btnDelAll);
            DeleteAll();
        }
    }
    function UpdateStatusAll(obj, op) {
        var btn = $(document).find(DF.btnTrashAll);
        btn.attr('data-placement', 'left');
        btn.attr('data-title', DF.CTitleText);
        btn.attr('data-btnOkLabel', DF.COkText);
        btn.attr('data-btnCancelLabel', DF.CCancelText);
        btn.confirmation({
            onConfirm: function (e, a) {
                var id = [];
                $(a).fadeOut('fast');
                $($(a).attr('data-item')).each(function () {
                    if ($(this).prop('checked') === true) {
                        id.push($(this).attr('value'));
                        $(this).parent().parent().fadeOut('slow', function () {
                            $(this).remove();
                        });
                    }
                });
                var data = {
                    id: id,
                    flag: DF.Status === 1 ? 0 : 1,
                    csrf_token_name: $.cookie('csrf_cookie_name')
                };
                $.post($(a).attr('data-url'), data, function () {
                    $($(a).attr('data-main')).prop('checked', false)
                            .removeAttr('checked', false);
                    btn.hide();
                    TMDT(obj, op);
                });
            }
        });
    }
    function DeleteAll(obj, op) {
        var btn = $(document).find(DF.btnDelAll);
        btn.attr('data-placement', 'left');
        btn.attr('data-title', DF.CTitleText);
        btn.attr('data-btnOkLabel', DF.COkText);
        btn.attr('data-btnCancelLabel', DF.CCancelText);
        btn.confirmation({
            onConfirm: function (e, a) {
                var id = [];
                $(a).fadeOut('fast');
                $($(a).attr('data-item')).each(function () {
                    if ($(this).prop('checked') === true) {
                        id.push($(this).attr('value'));
                        $(this).parent().parent().fadeOut('slow', function () {
                            $(this).remove();
                        });
                    }
                });
                var data = {
                    id: id,
                    csrf_token_name: $.cookie('csrf_cookie_name')
                };
                $.post($(a).attr('data-url'), data, function () {
                    $($(a).attr('data-main')).prop('checked', false)
                            .removeAttr('checked', false);
                    btn.hide();
                    TMDT(obj, op);
                });
            }
        });
    }

    jQuery.fn.editQuickClick = function () {
        $('.edit').attr('href', '#');
        $('.edit').click(function () {
            $('.old').show()
                    .removeClass('old');
            $('.tmp').remove();
            $(this).parent().parent().find('td').each(function () {
                if ($(this).find('span').length > 0) {
                    $(this).children().hide();
                    $(this).children().addClass('old');
                    $(this).append('<div><input style="width: 100%;" class="form-control tmp" id="input" type="text"' +
                            'placeholder="' + $(this).children().attr('plh') + '"' +
                            'name="' + $(this).children().attr('name') + '"' +
                            'value="' + $(this).children().html() + '"></div>');
                }
                if ($(this).find('img').length > 0) {
                    $(this).children().hide();
                    $(this).children().addClass('old');
                    $(this).append('<input style="width: 100%;" class="form-control tmp" type="file"' +
                            'name="' + $(this).children().attr('name') + '"' +
                            'value="' + $(this).children().html() + '">');
                }
            });
            $(this).parent().find('a').hide();
            $(this).parent().find('a').addClass('old');
            $(this).parent().append(
                    '<a class="btn-link glyphicon glyphicon-ok update tmp" href="#"></a>' +
                    '<a class="btn-link glyphicon glyphicon-refresh pull-right cancel tmp" href="#"></a>');
            $.fn.updateQuickClick('.update');
            $.fn.cancelClick('.cancel', '.old', '.tmp');
        });
    };
    jQuery.fn.updateQuickClick = function (update) {
        $(update).click(function () {
            var data, idKey, key, idVal, val, lid, txtKey, txtVal;
            lid = $('#subLang').val();
            $($(this).parent().parent().find('span').each(function () {
                if ($(this).attr('name') === 'key') {
                    idKey = $(this).attr('id')
                }
                if ($(this).attr('name') === 'value') {
                    idVal = $(this).attr('id')
                }
            }));
            $('input[type=text]').each(function () {
                if ($(this).attr('name') === 'key') {
                    key = $(this).val();
                    txtKey = $(this)
                }
                if ($(this).attr('name') === 'value') {
                    val = $(this).val();
                    txtVal = $(this)
                }
            });
            if (key === '' || val === '') {
                if (key === '') {
                    $(txtKey).parent().addClass('has-error');
                    $(txtKey).attr('placeholder', $(txtKey).parent().parent().find('span').attr('error'));
                }
                if (val === '') {
                    $(txtVal).parent().addClass('has-error');
                    $(txtVal).attr('placeholder', $(txtVal).parent().parent().find('span').attr('error'));
                }
            } else {
                data = 'idKey=' + idKey + '&key=' + key + '&idVal=' + idVal + '&val=' + val + '&lid=' + lid;
                $.post(DF.urlUpdate, data, function (json) {
                    TMDT();
                })
            }
        });
    };
    jQuery.fn.btnCreate = function () {
        var btn = $('#btnCreate');
        $('#btnCreate').remove();
        $('.nav-pills').append(btn);
        $('#btnCreate').click(function () {
            //$('#page-wrapper').fadeOut('slow');
            $('#page-wrapper').load(DF.urlDetails, function () {
                $.fn.insertClick();
                $.fn.btnBack();
                $('#btnCreate').remove();
                $('#btnDelDetails').remove();
                $('#btnUpdateClick').remove();
                $('.update').each(function () {
                    $(this).remove()
                });
                //$('#page-wrapper').fadeIn('slow');
            })
        })
    };
    jQuery.fn.btnUpdate = function () {
        $('.edit').attr('href', '#');
        $('.edit').click(function () {
            var data = 'id=' + $(this).parent().find('.delete').attr('name');
            //$('#page-wrapper').fadeOut('slow');
            $('#page-wrapper').load(DF.urlDetails, function () {
                $('.create').each(function () {
                    $(this).remove()
                });
                $.post(DF.urlDataDetails, data, function (json) {
                    $('#frmDetails').find('table tr td').each(function () {
                        var input = $(this).find('.data-input');
                        var label = $(this).find('.data-label');
                        $.each(json, function (k) {
                            if (input.attr('name') === k) {
                                input.val(json[k])
                            }
                            if (label.attr('name') === k) {
                                label.html(json[k])
                            }
                        })
                    });
                    if (json.stt === 0) {
                        $('#btnDelDetails').html($(this).attr('recover'));
                    }
                }, 'json');
                $.fn.updateClick();
                $.fn.btnBack();
                $.fn.DelAjaxDetailTM();
                $.fn.btnCreate();
                $('#btnCreateClick').remove();
                //$('#page-wrapper').fadeIn('slow')
            })
        })
    };
    jQuery.fn.insertClick = function () {
        $('#btnCreateClick').click(function () {
            $.post($(this).attr('TM-Url'), $('#frmDetails').serialize(), function (json) {
                $('input[type=text]').each(function () {
                    $(this).val('');
                });
                $('.alertTM').html(json.rs);
                $.fn.alertTM('.alertTM', '.alertTMClick');
                $.fn.setErrorBootstrap("inputError");
            }, 'json');
            return false;
        })
    };
    jQuery.fn.updateClick = function () {
        $('#btnUpdateClick').click(function () {
            $.post($(this).attr('TM-Url'), $('#frmDetails').serialize(), function (json) {
                $('.alertTM').html(json.rs);
                $.fn.alertTM('.alertTM', '.alertTMClick');
                $.fn.setErrorBootstrap("inputError");
            }, 'json');
            return false;
        })
    };
    jQuery.fn.btnBack = function () {
        $('#btnBackClick').click(function () {
            $.fn.backAction();
        })
    };
    jQuery.fn.backAction = function () {
        //$('#page-wrapper').fadeOut('slow');
        $('#page-wrapper').load(DF.urlList, function () {
            tableHead();
            tableFoot();
            TMDT();
            $.fn.showing();
            $.fn.trash();
            $.fn.datachange();
            //$('#page-wrapper').fadeIn('slow')
        })
    };
    jQuery.fn.cancelClick = function (cancel, old, tmp) {
        $(cancel).click(function () {
            $(old).show()
                    .removeClass(old.substring(1, old.length));
            $(tmp).remove();
        });
    };
    jQuery.fn.DelAjaxDetailTM = function () {
        var btn = $('#btnDelDetails');
        $('#btnDelDetails').remove();
        $('.nav-pills').append(btn);
        $('#btnDelDetails').attr('data-placement', 'right');
        $('#btnDelDetails').attr('data-title', DF.CTitleText);
        $('#btnDelDetails').attr('data-btnOkLabel', DF.COkText);
        $('#btnDelDetails').attr('data-btnCancelLabel', DF.CCancelText);
        $('#btnDelDetails').confirmation({
            onConfirm: function () {
                $.post(DF.urlDelete, "id=" + $('#idValue').val(), function (json) {
                    $.fn.backAction();
                });
                return false;
            }
        });
    };
    jQuery.fn.DelAjaxDetailTM2 = function (urldata) {
        $('#delete').confirmation({
            onConfirm: function () {
                //                $('#page-wrapper').slideUp('slow');
                $.post(urldata, 'id=' + $('#delete').attr('name'), function () {
                    document.location = urldata + '../../';
                    //                    $('#page-wrapper').slideDown('fast');
                }).done(function () {
                    //                    if (urldata !== window.location) {
                    //                        window.history.pushState({path: urldata + '../../'}, '', urldata + '../../');
                    //                    }
                    //                    return false;

                })
            }
        })
    };
    jQuery.fn.ajaxUpdateTM = function (urldata) {
        $('#submit').click(function (event) {
            var data = $('form').serialize() + '&id=' + $(this).attr('name');
            $.post(urldata, data, function (json) {
            });
            return false;
        });
    };
    jQuery.fn.ajaxValidateTM = function (urldata) {
        $('#submit').click(function () {
            var data = $('form').serialize();
            $.post(urldata, data, function (json) {
            });
            return false;
        });
    };
    jQuery.fn.ajax1 = function (urldata) {
        $('#result').click(function () {
            $.ajax({
                type: "GET",
                url: urldata,
                contentType: "application/json;charset=utf-8",
                dataType: 'JSON',
                cache: false,
                data: "",
                success: function (json) {
                    try {

                    } catch (e) {
                        alert('Exception while request..')
                    }
                },
                error: function () {
                    alert('Error while request..')
                },
                complete: function () {

                }
            })
        })
    };
    jQuery.fn.ajax2 = function (urldata) {
        $.postJSON(urldata, function (json) {

        })
    };
    jQuery.fn.ajax3 = function () {
        $('#exampform').submit(function () {
            $.post($('#exampform').attr('action'), $('#exampform').serialize(), function (json) {
            }, 'json');
            return false;
        })
    };
    //$.fn.TMDT.Constructor = TMDT()
    // ALERT NO CONFLICT
    // =================
    $.fn.TMDT.noConflict = function () {
        $.fn.TMDT = old
        return this
    }
//    TMDT.prototype.refresh = function (e) {
//        console.log('a');
//    }
//    var old = $.fn.TMDT;
//    $.fn.TMDT.Constructor = DF;
//    // TMDT NO CONFLICT
//    // =================
//
//    $.fn.TMDT.noConflict = function () {
//        $.fn.TMDT = old
//        return this
//    }
})(jQuery);

//jQuery(function () {
//    TMDT('.TMDT');
//    DataChange('.TMDT');
//    PaginationAction('.TMDT');
//    StatusAction('.TMDT');
//    $(document).ajaxStart(function () {
//        $('#ajaxLoadTM').html('<img src="' + $('#ajaxLoadTM').attr('url') + 'assets/loading/load1.gif"/>');
//    });
//    $(document).ajaxComplete(function () {
//        $.fn.delAjaxTableTM(DF.urlDelete);
//        //$.fn.delAjaxAllTableTM(DF.urlDelete, '.checkAll', '.checkitem');
//        $.fn.TMCheckBox('.checkAll', '.checkitem', '.btnAction');
//        $('#ajaxLoadTM').html('');
//        if (DF.EditAjax) {
//            $.fn.btnCreate();
//            if (DF.QuickEdit) {
//                $.fn.editQuickClick();
//            } else {
//                $.fn.btnUpdate();
//            }
//        }
//    });
//});