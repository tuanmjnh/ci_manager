(function($) {
    jQuery(function() {
        if ($('.ajaxTableTM').attr('url') !== undefined) {
            var url = $('.ajaxTableTM').attr('url') + '/' + $('.ajaxTableTM').attr('TM-Data');
            var check = ($('.ajaxTableTM').attr('TM-check') !== undefined ? $('.ajaxTableTM').attr('TM-check') : 'true');
            $.fn.tableTop();
            $.fn.tableBot();
            $.fn.ajaxTableTM(url);
//$('#datatable').dataTable();
//$.fn.checkAllTM('.checkAll', '.checkitem');
//$.fn.DelAjaxAllTableTM('<?php //echo base_url() ?>language', '.checkAll', '.checkitem');
            $('#showing').click(function() {
                $('#showing').addClass('btn-primary');
                $('#trash').removeClass('btn-primary');
                //$('#all').removeClass('btn-primary');
                $('.deleteAll')
                        .html('Delete')
                        .removeClass('btn-info')
                        .addClass('btn-danger')
                        .hide();
                $('.ajaxTableTM')
                        .attr('TM-check', check)
                        .attr('TM-Status', '1');
                $('.ajaxTableTM').attr('TM-Page', '1');
                $.fn.ajaxTableTM(url);
            });
            $('#trash').click(function() {
                $('#showing').removeClass('btn-primary');
                $('#trash').addClass('btn-primary');
                //$('#all').removeClass('btn-primary');
                $('.deleteAll')
                        .html('Recover')
                        .removeClass('btn-danger')
                        .addClass('btn-info')
                        .hide();
                $('.ajaxTableTM')
                        .attr('TM-check', check)
                        .attr('TM-Status', '0');
                $('.ajaxTableTM').attr('TM-Page', '1');
                $.fn.ajaxTableTM(url);
            });
            $('#offset').change(function() {
                $.fn.ajaxTableTM(url);
            });
//            $('#all').click(function() {
//                $('#true').removeClass('btn-primary');
//                $('#false').removeClass('btn-primary');
//                $('#all').addClass('btn-primary');
//                $('.deleteAll').hide();
//                $('.ajaxTableTM').attr('TM-check', 'false');
//                $.fn.ajaxTableTM(url + '/ajaxData');
//            });
        }
    });
})(jQuery);

//Json table
(function($) {
    jQuery.fn.jsonTableTM = function(json) {
        //table
        var sTable = $('<table border=1 class="table table-striped table-bordered table-hover" id="datatable"></table>');

        //head
        var thead = $('<thead></thead>').append($.fn.getThead(json.thead));
        //tfoot
        var tfoot = ($('.ajaxTableTM').attr('TM-foot') === undefined || $('.ajaxTableTM').attr('TM-foot') !== 'false') ?
                $('<tfoot></tfoot>').append($.fn.getThead(json.thead)) : null;

        //Url
//        var url = '';
//        $.each(json.url, function(j) {
//            url = json.url[j];
//        });
        var url = $('.ajaxTableTM').attr('url') + '/' + $('.ajaxTableTM').attr('TM-Details') + '/';

        //tbody
        var tbody = $('<tbody></tbody>');
        //print each obj
        $.each(json.tbody, function(j) {
            //check no
            var valtd = $.fn.getCheckNo(json.tbody[j].id, j + 1, url);
            //data from json
            $.each(json.tbody[j], function(k) {
                (k !== 'id' && k !== 'stt') ? valtd += $.fn.getTd(json.tbody[j].id, json.tbody[j][k], url) : null;
            });
            //command col
            valtd += $.fn.getCmd(json.tbody[j].id, url, json.tbody[j].stt);
            tbody.append('<tr>' + valtd + '</tr>');
        });
        //add data
        //$('.ajaxTableTM').html(null);
        //$('.ajaxTableTM').append($.fn.tableTop(), sTable.append(thead, tbody, tfoot), $.fn.tableBot());
        $('.ajaxTableTM').html(sTable.append(thead, tbody, tfoot));
    };
})(jQuery);

(function($) {
    jQuery.fn.getThead = function(json) {
        var checkbox = ($('.ajaxTableTM').attr('TM-check') === undefined || $('.ajaxTableTM').attr('TM-check') !== 'false') ?
                '<th class="col-xs-0"><div class="checkbox"><label><input type="checkbox" class="checkAll"></label></div></th>' : null;
        var number = ($('.ajaxTableTM').attr('TM-no') === undefined || $('.ajaxTableTM').attr('TM-no') !== 'false') ?
                '<th class="col-xs-05">#</th>' : null;
        var cmd = ($('.ajaxTableTM').attr('TM-no') === undefined || $('.ajaxTableTM').attr('TM-no') !== 'false') ?
                '<th class="col-xs-1">CMD</th>' : null;
        var dataHead = '';
        $.each(json, function(j) {
            dataHead += '<th>' + json[j] + '</th>';
        });
        return $('<tr></tr>').append(checkbox, number, dataHead, cmd);
    };
})(jQuery);

(function($) {
    jQuery.fn.getTd = function(id, value, url) {
        return ($('.ajaxTableTM').attr('TM-urlRow') === undefined || $('.ajaxTableTM').attr('TM-urlRow') !== 'false') ?
                '<td style="cursor:pointer" onclick="window.location=\'' + url + id + '\'">' + value + '</td>' :
                '<td>' + value + '</td>';
    };
})(jQuery);

(function($) {
    jQuery.fn.getCmd = function(json, url, stt) {
        var confirm = ($('.ajaxTableTM').attr('TM-title') !== undefined && $('.ajaxTableTM').attr('TM-title') !== '') ?
                'data-title="' + $('.ajaxTableTM').attr('TM-title') + '" ' : null;
        confirm += ($('.ajaxTableTM').attr('TM-OkLabel') !== undefined && $('.ajaxTableTM').attr('TM-OkLabel') !== '') ?
                'data-btnOkLabel="' + $('.ajaxTableTM').attr('TM-OkLabel') + '" ' : null;
        confirm += ($('.ajaxTableTM').attr('TM-CancelLabel') !== undefined && $('.ajaxTableTM').attr('TM-CancelLabel') !== '') ?
                'data-btnCancelLabel="' + $('.ajaxTableTM').attr('TM-CancelLabel') + '"' : null;
        var edit = '<a name="edit" ';
        if (stt === '0') {
            edit += 'class="btn-link glyphicon glyphicon-repeat recover" href="javascript:void(0)" ' + confirm + '></a>';
        } else {
            edit += 'class="btn-link glyphicon glyphicon-pencil edit" href="' +
                    ((url !== '' && url !== undefined) ? url + json : 'javascript:void(0)') + '"></a>';
        }
        var del = '<a name="' + json + '" href="javascript:void(0)" ' +
                'class="btn-link glyphicon glyphicon-remove pull-right delete" ' + confirm + '></a>';
        return '<td>' + edit + del + '</td>';
    };
})(jQuery);

(function($) {
    jQuery.fn.getCheckNo = function(json, value, url) {
        //td check
        var tdcheck = ($('.ajaxTableTM').attr('TM-check') === undefined || $('.ajaxTableTM').attr('TM-check') !== 'false') ?
                '<td><div class="checkbox"><label><input type="checkbox" class="checkitem"></label></div></td>' : null;
        //td no.
        var tdno = ($('.ajaxTableTM').attr('TM-no') === undefined || $('.ajaxTableTM').attr('TM-no') !== 'false') ?
                $.fn.getTd(json, value, url) : null;
        return tdcheck + tdno;
    };
})(jQuery);

(function($) {
    jQuery.fn.tableTop = function() {
        var row = $('<div class="row"></div>');
        var records = '<div class="col-sm-6"><div class="dataTables_length"><label id="tmtm">' +
                '<select id="offset" class="form-control input-sm">' +
                '<option value="10">10</option>' +
                '<option value="25">25</option>' +
                '<option value="50">50</option>' +
                '<option value="100">100</option>' +
                '</select> ' +
                $('.ajaxTableTM').attr('TM-Record') +
                '</label></div></div>';

        var searchAll = '<div class="searchTable col-sm-6"><div class="dataTables_filter"><label class="pull-right">' +
                $('.ajaxTableTM').attr('TM-Search') + ' <input id="searchAll" class="form-control input-sm" type="search" aria-controls="datatable"></input>' +
                '</label></div></div>';
        $('.ajaxTop').html(row.append(records, searchAll));
    };
})(jQuery);
(function($) {
    jQuery.fn.tableBot = function() {
        var row = $('<div class="row"></div>');
        var info = '<div class="col-sm-6"><div class="dataTables_info">' +
                $('.ajaxTableTM').attr('TM-Info') + ' <label class="totalRecord"></label>' +
                '</div></div>';
        var pagination = '<div class="col-sm-6"><div class="dataTables_paginate paging_simple_numbers"></div></div>';
        $('.ajaxBot').html(row.append(info, pagination));
    };
})(jQuery);
(function($) {
    jQuery.fn.pagination = function(totalpage) {
        var current = parseInt($('.ajaxTableTM').attr('TM-Page'));
        var limit = 5;
        var start = ((current - Math.ceil(limit / 2) <= 0) ? 1 : current - Math.ceil(limit / 2)) + 1;
        var sides = current + Math.ceil(limit / 2);
        var sli = '<li class="paginate_button"><a class="linkPage" href="javascript:void(0)">';
        var eli = '</a></li>';
        var prev = (current === 1) ?
                //'<li class="paginate_button disabled"><a class="prev" href="javascript:void(0)">Previous</a></li>' :
                '<li class="paginate_button disabled"><a class="prev" href="javascript:void(0)">&laquo;</a></li>' :
                '<li class="paginate_button"><a class="prev" href="javascript:void(0)">&laquo;</a></li>';
        var next = (current === totalpage) ?
                //'<li class="paginate_button disabled"><a class="next" href="javascript:void(0)">Next</a></li>' :
                '<li class="paginate_button disabled"><a class="next" href="javascript:void(0)">&raquo;</a></li>' :
                '<li class="paginate_button"><a class="next" href="javascript:void(0)">&raquo;</a></li>';
        var ellipsis = '<li class="paginate_button disabled"><a href="javascript:void(0)">...</a></li>';

        var pagination = prev;
        if (totalpage < limit) {
            for (i = 1; i <= totalpage; i++) {
                pagination += sli + i + eli;
            }
        } else {
            pagination += sli + 1 + eli;
            for (i = start; i < totalpage; i++) {
                if (start > 2 && i === start) {
                    pagination += ellipsis;
                }
                if (current < 4) {
                    if (i < sides + (4 - current)) {
                        pagination += sli + i + eli;
                    } else {
                        if (i === sides + (4 - current)) {
                            pagination += ellipsis;
                        }
                    }
                } else {
                    if (i < sides) {
                        pagination += sli + i + eli;
                    } else {
                        if (i === sides) {
                            pagination += ellipsis;
                        }
                    }
                }
            }
            if (totalpage > 1) {
                pagination += sli + totalpage + eli;
            }
        }
        pagination += next;
        pagination = $('<ul class="pagination pull-right"></ul>').append(pagination);
        return pagination;
    };
})(jQuery);
(function($) {
    jQuery.fn.pageClick = function(url, totalpage) {
        //var index = $('.ajaxTableTM').attr('TM-Page');
        var index = $('.ajaxTableTM').attr('TM-Page');
        $('.prev').click(function() {
            if (index > 1) {
                $('.ajaxTableTM').attr('TM-Page', parseInt(index) - 1);
                $.fn.ajaxTableTM(url);
            }
        });
        $('.next').click(function() {
            if (index < totalpage) {
                $('.ajaxTableTM').attr('TM-Page', parseInt(index) + 1);
                $.fn.ajaxTableTM(url);
            } else {
                $(this).addClass('disabled');
            }
        });
        $('.linkPage').click(function() {
            $('.ajaxTableTM').attr('TM-Page', $(this).html());
            $.fn.ajaxTableTM(url);
        });
        $('.linkPage').each(function() {
            if (parseInt($(this).html()) === parseInt($('.ajaxTableTM').attr('TM-Page'))) {
                $(this).parent().addClass('active');
            }
            ;
        });
    };
})(jQuery);
//Ajax
(function($) {
    jQuery.fn.ajaxTableTM = function(urldata) {
        var url = ($('.ajaxTableTM').attr('url') !== undefined ? $('.ajaxTableTM').attr('url') : null);
        var stt = 'stt=' + $('.ajaxTableTM').attr('TM-Status');
        var offset = '&offset=' + $('#offset').val();
        var page = '&page=' + $('.ajaxTableTM').attr('TM-Page');
        $('#ajaxLoadTM').html('<img src="' + url + '../../assets/loading/load1.gif"/>');
        $.ajax({
            type: 'GET',
            url: urldata,
            data: stt + offset + page,
            contentType: "application/json;charset=utf-8",
            dataType: 'json',
            cache: false,
            async: true,
            success: function(json) {
                try {
                    $.fn.jsonTableTM(json);
                    $('.dataTables_paginate').html($.fn.pagination(json.pageData.totalPage));
                    $('.totalRecord').html(json.pageData.totalCount);
                    $.fn.pageClick(urldata, json.pageData.totalPage);
                    //alert(page);
                } catch (e) {
                    //alert('Exception while request..');
                    alert(e);
                }
            },
            error: function(e) {
                //alert('Error while request..');
                alert(e);
            },
            complete: function() {
                $.fn.DelAjaxTableTM(url);
                $.fn.RecoverAjaxTableTM(url);
                //$('#datatable').dataTable();
                $.fn.checkAllTM('.checkAll', '.checkitem');
                $.fn.DelAjaxAllTableTM(url, '.checkAll', '.checkitem');
                $('#ajaxLoadTM').html('');
            }
        });
//                .done(function(json) {
//                    $.fn.jsonTableTM(json);
//                });
    };
})(jQuery);

(function($) {
    jQuery.fn.DelAjaxTableTM = function(urldata) {
        $('.delete').confirmation(
                {
                    onConfirm: function() {
                        var id = $(this).parent().parent().parent().parent().find('.delete').attr('name');
                        var row = $(this).parent().parent().parent().parent().parent();
                        $.ajax({
                            url: urldata,
                            type: "GET",
                            async: true,
                            cache: true,
                            data: "id=" + id,
                            success: function() {
                                try {
                                    row.fadeOut('slow', function() {
                                        $(this).remove();
                                    });
                                } catch (e) {
                                    alert('Exception while request..');
                                }
                            },
                            error: function() {
                                alert('Error while request..');
                            }
                        });
                    }
                });
    };
})(jQuery);

(function($) {
    jQuery.fn.RecoverAjaxTableTM = function(urldata) {
        $('.recover').confirmation(
                {
                    onConfirm: function() {
                        var id = $(this).parent().parent().parent().parent().find('.delete').attr('name');
                        var row = $(this).parent().parent().parent().parent().parent();
                        $.ajax({
                            url: urldata,
                            type: "GET",
                            async: true,
                            cache: true,
                            data: "id=" + id,
                            success: function() {
                                try {
                                    row.fadeOut('slow', function() {
                                        $(this).remove();
                                    });
                                } catch (e) {
                                    alert('Exception while request..');
                                }
                            },
                            error: function() {
                                alert('Error while request..');
                            }
                        });
                    }
                });
    };
})(jQuery);

(function($) {
    jQuery.fn.DelAjaxAllTableTM = function(urldata, all, item) {
        $('.deleteAll').confirmation(
                {
                    onConfirm: function() {
                        var id = [];
                        $(this).parent().parent().parent().fadeOut('fast');
                        $('#ajaxLoadTM').html('<img src="' + urldata + '../../assets/loading/load1.gif"/>');
                        $(item).each(function() {
                            if ($(this).prop('checked') === true) {
                                id.push($(this).parent().parent().parent().parent().find('.delete').attr('name'));
                            }
                        });
                        $.ajax({
                            url: urldata,
                            type: "GET",
                            data: "id=" + id,
                            success: function() {
                                try {
                                    $(item).each(function() {
                                        if ($(this).prop('checked') === true) {
                                            $(this).parent().parent().parent().parent().fadeOut('slow', function() {
                                                $(this).remove();
                                            });
                                        }
                                    });
                                } catch (e) {
                                    alert('Exception while request..');
                                }
                            },
                            error: function() {
                                alert('Error while request..');
                            },
                            complete: function() {
                                $('#ajaxLoadTM').html("");
                                $('.deleteAll').fadeOut('fast');
                                $(all).prop('checked', false)
                                        .removeAttr('checked', false);
                            }
                        });
                    }
                });
    };
})(jQuery);

(function($) {
    jQuery.fn.DelAjaxDetailTM = function(urldata) {
        $('#delete').confirmation(
                {
                    onConfirm: function() {
                        var id = $('#delete').attr('name');
                        $('#ajaxLoadTM').html('<img src="' + urldata + '../../assets/loading/load1.gif"/>');
                        $('#page-wrapper').slideUp('slow');
                        $.ajax({
                            url: urldata,
                            type: "GET",
                            async: false,
                            cache: false,
                            data: "id=" + id,
                            success: function() {
                                try {
                                    $('#page-wrapper').slideDown('fast');
                                    $('#wrapper').load(urldata);
                                } catch (e) {
                                    alert('Exception while request..');
                                }
                            },
                            error: function() {
                                alert('Error while request..');
                            },
                            complete: function() {
                                if (urldata !== window.location) {
                                    window.history.pushState({path: urldata}, '', urldata);
                                }
                                return false;
                            }
                        });
                    }
                });
    };
})(jQuery);

(function($) {
    jQuery.fn.ajaxUpdateTM = function(urldata) {
        $('#submit').click(function(event) {
            var data = $('form').serialize() + '&id=' + $(this).attr('name');
            $.ajax({
                type: "POST",
                url: urldata,
                cache: false,
                data: data,
                error: function() {
                    alert('Error while request..');
                }
            });
            event.preventDefault();
        });
    };
})(jQuery);
(function($) {
    jQuery.fn.ajaxValidateTM = function(urldata) {
        $('#submit').click(function(event) {
            var data = $('form').serialize();
            $.ajax({
                type: "POST",
                contentType: "application/json;charset=utf-8",
                url: urldata,
                cache: false,
                data: data,
                dataType: 'JSON',
                success: function(json) {
                    $.each(json, function(i) {
                        $('#msg').append(json[i]);
                        //alert(json[i]);
                    });
                    $('#msg').append(json);

                },
                error: function() {
                    alert('Error while request..');
                }
            });
            event.preventDefault();
        });
    };
})(jQuery);
//ajax start
//$(document).ajaxStart(function() {
//alert("AJAX START");
//timer = setTimeout(function () { body.addClass("loading"); }, 50)
//$('#tmtm').html('<img src="../../assets/loading/load1.gif"/>');
//});
//ajax stop
//$(document).ajaxStop(function() {
//alert("AJAX STOP!!!");
//$(this).removeClass("loading");
//clearTimeout(timer);
//});

(function($) {
    jQuery.fn.ajax1 = function(urldata) {
        $('#result').click(function() {
            $.ajax({
                type: "GET",
                url: urldata,
                contentType: "application/json;charset=utf-8",
                dataType: 'JSON',
                cache: false,
                data: "",
                success: function(json) {
                    try {

                    } catch (e) {
                        alert('Exception while request..');
                    }
                },
                error: function() {
                    alert('Error while request..');
                },
                complete: function() {

                }
            });
            //alert(val);
        });
    };
})(jQuery);

(function($) {
    jQuery.fn.ajax2 = function(urldata) {
        $.getJSON(urldata, function(json) {

        });
    };
})(jQuery);

