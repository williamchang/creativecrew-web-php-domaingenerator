<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="robots" content="index, follow"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="author" content="William Chang"/>
    <title>Domain Generator</title>
    <style type="text/css" media="screen">

/* Baseline Elements */
body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,pre,code,form,fieldset,legend,input,textarea,p,blockquote,th,td{margin:0;padding:0;}table{border-collapse:collapse;border-spacing:0;}fieldset,img{border:0;}address,caption,cite,code,dfn,em,strong,th,var{font-style:normal;font-weight:normal;}li{list-style:none;}caption,th{text-align:left;}h1,h2,h3,h4,h5,h6{font-size:100%;font-weight:normal;}q:before,q:after{content:'';}abbr,acronym {border:0;font-variant:normal;}sup {vertical-align:text-top;}sub {vertical-align:text-bottom;}input,textarea,select{font-family:inherit;font-size:inherit;font-weight:inherit;}legend{color:#000;}
table { empty-cells:show; }
/* Baseline Styles */
body { font-family:Verdana, Arial, Helvetica, sans-serif;font-size:0.9em;color:#000; }
/* Round Corners */
em.stop, em.sbtm { display:block;background:transparent;font-size:1px; }
em.s1, em.s2, em.s3, em.s4 { display:block;overflow:hidden; }
em.s1, em.s2, em.s3 { height:1px; }
em.s2, em.s3, em.s4 { background:#fbfbfb;border-left:1px solid #ebebeb;border-right:1px solid #ebebeb; }
em.s1 { margin:0 5px;background:#ebebeb; }
em.s2 { margin:0 3px;border-width:0 2px; }
em.s3 { margin:0 2px; }
em.s4 { height:2px;margin:0 1px; }
.s-sbox { display:block;background:#fbfbfb;border:0 solid #ebebeb;border-width:0 1px; }
/* Frame Properties */
body { background:url(http://www.creativecrew.org/images/body_bg2.gif) #333 repeat fixed 0 0; }
#frame { width:660px;margin:0 auto;padding:64px 0; }
#frame .buffer { padding:4px 0; }
/* Content Properties */
.content { width:640px;margin:0 auto;overflow:hidden;border:1px solid #ddd;background:#fff; }
.content .buffer { margin:10px 10px; }
.content .section { margin:10px 0 0 0;padding:10px 0 0 10px;background:url(http://www.creativecrew.org/images/left-top-corner-box.jpg) transparent no-repeat top left; }
/* Element Properties */
h1 { color:#3c475b;font-weight:bold;font-size:1.6em; }
h2 { color:#3c475b;font-weight:bold;font-size:1.3em; }
h3 { color:#3c475b;font-weight:bold;font-size:1.2em;margin-bottom:8px; }
h4 { color:#000;font-weight:bold;font-size:1em;margin-bottom:8px; }
p { margin:1.33em 0; }
pre { font-size:1.4em; }
blockquote { margin:0 40px 0 40px;font-style:italic; }
ul { margin:10px 0 10px 20px; }
ul li { list-style-type:disc; }
ul li ul { margin:0 0 0 20px;list-style-type:circle; }
ul li ul li { list-style-type:circle; }
ul li ul li ul li { list-style-type:square; }
ol { margin:10px 0 10px 30px; }
ol li { list-style-type:decimal; }
dl { margin:10px 0 10px 0; }
dl dt { margin:4px 0; }
dl dd { margin:2px 0 2px 40px; }
strong { font-weight:bold; }
input { vertical-align:middle; }
input[type=text], input[type=password] { border:solid 1px #b4b4b4;background-color:#fff;color:#000; }
textarea { border:solid 1px #b4b4b4;background-color:#fff;color:#000; }
input[type=text]:hover, input[type=password]:hover, textarea:hover { border-color:#11a3ea; }
input[type=text]:focus, input[type=password]:focus, textarea:focus { border-color:#bc2a4d; }
select { border:solid 1px #b4b4b4;background-color:#fff;color:#000; }
input[disabled][type=text], input[disabled][type=password], textarea[disabled], select[disabled] { background-color:#eaf5fe;color:#999; }
/* Generic Classes */
.bold { font-weight:bold; }
.italic { font-style:italic; }
.center { text-align:center; }
.line {	border-top: 1px solid #ccc;border-bottom: 1px solid #efefef;margin:8px auto;height:0;overflow:hidden; }
.image { float:right;margin:10px 0 10px 10px;border:4px solid #ddd; }
.hide { display:none; }
.titlesuperscript { float:right;padding:0 8px 0 0;font-size:0.7em; }
.bgwhite { background-color:#fff; }
/* Links */
a { color:#524cc3; }
a:link, a:visited { text-decoration:none;color:#524cc3; }
a:hover, a:active { text-decoration:underline;color:#524cc3; }
h1 a { color:#3c475b; }
h1 a:link, h1 a:visited { text-decoration:none;color:#3c475b; }
h1 a:hover, h1 a:active { text-decoration:none;color:#000; }
h3 a { color:#3c475b; }
h3 a:link, h3 a:visited { text-decoration:none;color:#3c475b; }
h3 a:hover, h3 a:active { text-decoration:none;color:#000; }
.titlesuperscript {color:#3c475b; }
.titlesuperscript a:link, .titlesuperscript a:visited { text-decoration:none;color:#3c475b; }
.titlesuperscript a:hover, .titlesuperscript a:active { text-decoration:none;color:#000; }
/* Footer */
.credit { margin:10px 0;font-size:0.6em;color:#999; }
.credit a:link, .credit a:visited { text-decoration:none;color:#999; }
.credit a:hover, .credit a:active { text-decoration:underline;color:#bbb; }
.badges ul { margin:0;padding:0;width:100%; }
.badges ul li { display:inline; }
/* Page Specific Styles */
.error { padding:10px;margin-bottom:10px;border:dashed 1px #ff0000;background:#ffcccc;overflow:hidden; }
.inform { padding:10px;margin-bottom:10px;border:dashed 1px #008000;background:#bbeebb;overflow:hidden; }
.loading { display:none;width:16px;height:16px;background:url(http://www.babybluebox.com/images/loading_ajax3.gif) transparent no-repeat 0 0; }
.tbl { width:100%;margin-bottom:10px;border:solid 1px #ccc;border-width:1px 0 0 1px;text-align:left; }
.tbl th { padding:2px;border:solid 1px #ccc;background:#f3f3f3;border-width:0 1px 1px 0;font-weight:bold; }
.tbl td { padding:2px;border:solid 1px #ccc;border-width:0 1px 1px 0; }
.frmcommon { margin-bottom:10px;text-align:center; }
.frmcommon .inputs { margin-bottom:6px; }
.frmcommon .inputs label { display:block;padding:0 0 4px 0;clear:both;text-align:left; }
.frmcommon .controls { text-align:right;font-weight:normal; }
.frmcommon .txtcommon { width:100%;height:19px;padding:2px 0 0 3px; }
.frmcommon .ddlcommon { height:21px; }
.frmcommon .btncommon { width:74px;padding:2px 0;font-size:11px; }

    </style>
    <style type="text/css" media="print">

body { font-family:"Times New Roman", Times, serif;font-size:0.9em;color:#000; }
img { border:0; }
form { display:none; }
h1 { padding-bottom:4px;border-bottom:#000 solid 1px;text-align:center;font-size:1.6em; }
a:link, a:visited, a:hover, a:active { text-decoration:none;color:#000; }
.printhide { display:none; }
.titlesuperscript { text-align:center; }
.credit { padding-top:4px;border-top:1px solid #000;text-align:center; }
.badges { display:none; }

    </style>
    <script src="http://jquery.com/src/jquery-latest.js" type="text/javascript"></script>
    <script src="http://ui.jquery.com/js/ui.js" type="text/javascript"></script>
    <script type="text/javascript">
    //<![CDATA[

// Class Domain Generator.
classDomainGenerator = function() {
    memberPublic = this;
    memberPublic.removeAffix = removeAffix;
    memberPublic.init = init;
    var _strDelimiter = '';

    // Create prefix by JSON RPC.
    function _createPrefix(e) {
        var str = document.getElementById('ajax-prefix-create-txt').value;
        var elements = $('#ajax-prefix-create-form input').get();
        if(!isEmpty(str)) {
            $(elements).filter(':button').attr('disabled', 'disabled');
            jsonRpc(elements, 'createPrefix', '"' + str + '"', $('div#ajax-debug-output').hide('normal').get(0), document.getElementById('ajax-prefix-create-lod'));
        } else {
            _error('Prefix field is empty.');
        }
    }
    // Create postfix by JSON RPC.
    function _createPostfix(e) {
        var str = document.getElementById('ajax-postfix-create-txt').value;
        var elements = $('#ajax-postfix-create-form input').get();
        if(!isEmpty(str)) {
            $(elements).filter(':button').attr('disabled', 'disabled');
            jsonRpc(elements, 'createPostfix', '"' + str + '"', $('div#ajax-debug-output').hide('normal').get(0), document.getElementById('ajax-postfix-create-lod'));
        } else {
            _error('Postfix field is empty.');
        }
    }
    // Remove affix by JSON RPC.
    function removeAffix(eleTriggers, ajaxMethod) {
        var args = $(eleTriggers).next().text();
        $(eleTriggers).parent().parent().remove();
        jsonRpc(eleTriggers, ajaxMethod, args, null, null);
    }
    // Set expression.
    function _setExpression(e) {
        $('input#ajax-expression-set-btn').attr('disabled', 'disabled');
        $('input#ajax-expression-set-txt').attr('disabled', 'disabled');
        _enableGenerator();
    }
    // Set delimiter.
    function _setDelimiter(e) {
        $('input#ajax-delimiter-set-btn').attr('disabled', 'disabled');
        $('input#ajax-delimiter-set-txt').attr('disabled', 'disabled');
        _enableGenerator();
    }
    // Enable generator.
    function _enableGenerator() {
        // Check required fields.
        if(isEmpty($('input#ajax-expression-set-txt[disabled]').val())) {
            _disableGenerator();
            return;
        }
        if(isEmpty($('input#ajax-delimiter-set-txt[disabled]').val())) {
            _disableGenerator();
            return;
        }
        $('input#ajax-generate-output-btn').removeAttr('disabled');
    }
    // Disable generator.
    function _disableGenerator() {
        $('textarea#ajax-generate-output-txt').attr('disabled', 'disabled');
        $('input#ajax-generate-output-btn').attr('disabled', 'disabled');
        $('input#ajax-generate-check-btn').attr('disabled', 'disabled');
    }
    // Generate unions.
    function _generateUnions() {
        // Check collections.
        if($('div#ajax-prefix-collection.ajax_affix_collection_queried').length <= 0) {return;}
        if($('div#ajax-postfix-collection.ajax_affix_collection_queried').length <= 0) {return;}

        var elePrefixes = $('div#ajax-prefix-collection > span').get();
        var elePostfixes = $('div#ajax-postfix-collection > span').get();
        var strExpression = document.getElementById('ajax-expression-set-txt').value;
        var strDelimiter = document.getElementById('ajax-delimiter-set-txt').value;
        var strUnions = '';
        var i, j;

        _strDelimiter = _checkEscapeCharacters(strDelimiter);
        if(elePrefixes.length >= elePostfixes.length) {
            for(i = 0;i < elePrefixes.length;i++) {
                strUnions += elePrefixes[i].innerHTML + strExpression;
                for(j = 0;j < elePostfixes.length;j++) {
                    strUnions += elePostfixes[j].innerHTML;
                }
                strUnions += _strDelimiter;
            }
        } else {
            for(i = 0;i < elePostfixes.length;i++) {
                for(j = 0;j < elePrefixes.length;j++) {
					strUnions += elePrefixes[j].innerHTML;
                }
				strUnions += strExpression + elePostfixes[i].innerHTML;
                strUnions += _strDelimiter;
            }
        }

        $('textarea#ajax-generate-output-txt').removeAttr('disabled');
        $('input#ajax-generate-check-btn').removeAttr('disabled');
        document.getElementById('ajax-generate-output-txt').value = strUnions;
    }
    // Generate collections.
    function _generate(e) {
        $(this).filter(':button').attr('disabled', 'disabled');
        $('div#ajax-prefix-collection, div#ajax-postfix-collection').removeClass();
        $('div#ajax-prefix-collection *, div#ajax-postfix-collection *').remove();
        // Get and set collections.
        jsonRpc(this, 'getPrefixes', '', $('div#ajax-prefix-collection').get(0), document.getElementById('ajax-generate-output-lod'));
        jsonRpc(this, 'getPostfixes', '', $('div#ajax-postfix-collection').get(0), document.getElementById('ajax-generate-output-lod'));
    }
    // Check escape characters.
    function _checkEscapeCharacters(str) {
        if(str.lastIndexOf('\\n') >= 0) {
            return str.substring(0, str.length - 2) + '\n';
        } else {
            return str;
        }
    }
    // Proceed to external.
    function _proceedExternal(e) {
        var str = $('textarea#ajax-generate-output-txt').val();
        var separator = _strDelimiter;
        var ary = str.split(separator);
        ary.pop();
        if(ary.length == 1) {
            document.getElementById('external-output-form-domain').value = ary.shift();
        } else {
            document.getElementById('external-output-form-domain').value = ary.join(',');
        }
        document.forms['external-output-form'].submit();
    }
    // Output error.
    function _error(msg) {
        msg = '<h4>Error</h4>' + msg + '<br/>';
        $('div#ajax-error-output').hide().addClass('error').html(msg).show('normal', function() {
            if($.browser.msie) {$(this).get(0).style.removeAttribute('filter');}
        }).bind('click', function(e) {
            $(this).hide('normal').html('');
        });
    }
    // Set events.
    function _setEvents() {
        _enableGenerator();

        $('input#ajax-expression-set-btn').bind('click', _setExpression);
        $('input#ajax-expression-set-txt').bind('keypress focus', function(e) {
            if(e.type == 'focus') {this.select();}
            if(e.type == 'keypress' && e.keyCode == 13) {$('input#ajax-expression-set-btn').trigger('click');}
        });

        $('input#ajax-prefix-create-btn').bind('click', _createPrefix);
        $('input#ajax-prefix-create-txt').bind('keypress focus', function(e) {
            if(e.type == 'focus') {this.select();}
            if(e.type == 'keypress' && e.keyCode == 13) {$('input#ajax-prefix-create-btn').trigger('click');}
        });

        $('input#ajax-postfix-create-btn').bind('click', _createPostfix);
        $('input#ajax-postfix-create-txt').bind('keypress focus', function(e) {
            if(e.type == 'focus') {this.select();}
            if(e.type == 'keypress' && e.keyCode == 13) {$('input#ajax-postfix-create-btn').trigger('click');}
        });

        $('input#ajax-delimiter-set-btn').bind('click', _setDelimiter);
        $('input#ajax-delimiter-set-txt').bind('keypress focus', function(e) {
            if(e.type == 'focus') {this.select();}
            if(e.type == 'keypress' && e.keyCode == 13) {$('input#ajax-delimiter-set-btn').trigger('click');}
        });

        $('input#ajax-expression-clear-btn').bind('click', function(e) {
             $('input#ajax-expression-set-btn').removeAttr('disabled');
             $('input#ajax-expression-set-txt').val('').removeAttr('disabled');
             _disableGenerator();
        });

        $('input#ajax-delimiter-clear-btn').bind('click', function(e) {
             $('input#ajax-delimiter-set-btn').removeAttr('disabled');
             $('input#ajax-delimiter-set-txt').val('').removeAttr('disabled');
             _disableGenerator();
        });

        $('div#ajax-debug-output').hide().addClass('inform').css('cursor', 'default').bind('click', function(e) {
            $(this).hide('normal').html('');
        }).bind('output', function(e, jsonObject, status) {
            var statusClass = (status.match('success') != null) ? 'error' : 'inform';
            $(this).addClass(statusClass).html(status + 'jsonrpc:' + jsonObject.jsonrpc + ' id:' + jsonObject.id).show('normal', function() {
                if($.browser.msie) {$(this).get(0).style.removeAttribute('filter');}
            });
            if(status.match('success') != null) {
                if(status.toLowerCase().match('prefix') != null) {
                    $('input#ajax-prefix-datatable-refresh-btn').trigger('click');
                } else if(status.toLowerCase().match('postfix') != null) {
                    $('input#ajax-postfix-datatable-refresh-btn').trigger('click');
                }
            }
        });

        $('input#ajax-prefix-datatable-refresh-btn').bind('click', function(e) {
            $(this).val('Refresh');
            jsonRpc(this, 'getPrefixes', '', $('div#ajax-prefix-datatable', null).get(0));
        });

        $('input#ajax-postfix-datatable-refresh-btn').bind('click', function(e) {
            $(this).val('Refresh');
            jsonRpc(this, 'getPostfixes', '', $('div#ajax-postfix-datatable', null).get(0));
        });

        $('div#ajax-prefix-datatable').bind('output', function(e, jsonObject, status) {
            $('table tr', this).remove(':has(td)');
            if(!isEmpty(jsonObject.result)) {
                $.each(jsonObject.result, function() {
                    $('div#ajax-prefix-datatable > table').append('<tr><td>' + this[1] + '</td><td class="controls"><input type="button" class="btncommon" value="Delete" onclick="app.removeAffix(this, \'removePrefix\');"/><span class="hide">' + this[0] + '</span></td></tr>');
                });
            }
        });

        $('div#ajax-postfix-datatable').bind('output', function(e, jsonObject, status) {
            $('table tr', this).remove(':has(td)');
            if(!isEmpty(jsonObject.result)) {
                $.each(jsonObject.result, function() {
                    $('div#ajax-postfix-datatable > table').append('<tr><td>' + this[1] + '</td><td class="controls"><input type="button" class="btncommon" value="Delete" onclick="app.removeAffix(this, \'removePostfix\');"/><span class="hide">' + this[0] + '</span></td></tr>');
                });
            }
        });

        $('input#ajax-generate-output-btn').bind('click', _generate);

        $('div#ajax-prefix-collection').bind('output', function(e, jsonObject, status) {
            $(this).addClass('ajax_affix_collection_queried');
            if(!isEmpty(jsonObject.result)) {
                $.each(jsonObject.result, function() {$('div#ajax-prefix-collection').append('<span>' + this[1] + '</span>');});
            }
             _generateUnions();
        });

        $('div#ajax-postfix-collection').bind('output', function(e, jsonObject, status) {
            $(this).addClass('ajax_affix_collection_queried');
            if(!isEmpty(jsonObject.result)) {
                $.each(jsonObject.result, function() {$('div#ajax-postfix-collection').append('<span>' + this[1] + '</span>');});
            }
            _generateUnions();
        });

        $('input#ajax-generate-check-btn').bind('click', _proceedExternal);
    }
    // Initialize.
    function init() {
        _setEvents();
    }
}
// Is empty.
function isEmpty(mixed_var) {
    return (mixed_var == undefined || mixed_var === '' || mixed_var === 0 || mixed_var === '0' || mixed_var === null || mixed_var === false || (isArray(mixed_var) && mixed_var.length === 0));
}
// Is array.
function isArray(mixed_var) {return (mixed_var instanceof Array);}
// Perform AJAX by JSON RPC.
function jsonRpc(eleTriggers, ajaxMethod, ajaxArguments, eleOutput, eleLoading) {
    if(!isEmpty(eleLoading)) {eleLoading.style.display = 'inline'};
    var timeCurrent = new Date();
    var ajaxId = timeCurrent.getSeconds() + (timeCurrent.getMinutes() * 100) + (timeCurrent.getHours() * 10000);
    if(typeof ajaxMethod === 'string' && typeof ajaxArguments === 'string') {
        $.ajax({
            type:'POST',
            url:'get.php',
            beforeSend:function(xhr) {
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            },
            data:{json:'{"jsonrpc":"2.0", "method":"' + ajaxMethod + '", "params":[' + ajaxArguments + '], "id":' + ajaxId + '}'},
            dataType:'json',
            timeout:3000,
            error:function(xhr, status, ex) {
                if(!isEmpty(eleLoading)) {eleLoading.style.display = 'none'};
                status = '<h4>AJAX Error</h4>' + status + ', ' + ajaxMethod + '(' + ajaxArguments + ')<br/>';
                $(eleOutput).trigger('output', [null, status]);
                var eleTextbox = $(eleTriggers).removeAttr('disabled').filter(':text').get(0);
                if(!isEmpty(eleTextbox)) {eleTextbox.select();}
            },
            success:function(data, status) {
                if(!isEmpty(eleLoading)) {eleLoading.style.display = 'none'};
                status = '<h4>AJAX JSON RPC</h4>' + status + ', ' + ajaxMethod + '(' + ajaxArguments + ')<br/>';
                $(eleOutput).trigger('output', [data, status]);
                var eleTextbox = $(eleTriggers).removeAttr('disabled').filter(':text').get(0);
                if(!isEmpty(eleTextbox)) {eleTextbox.select();}
            }
        });
    }
    return false;
}
var app = new classDomainGenerator();
// Register ready event to be executed when the DOM document has finished loading.
$(document).ready(function() {
    app.init();
});

    //]]>
    </script>
</head>
<body>
<div id="frame">
    <em class="stop"><em class="s1"></em><em class="s2"></em><em class="s3"></em><em class="s4"></em></em><div class="s-sbox">
    <div class="buffer"><div class="content"><div class="buffer">
    <div id="region-middle" class="region-middle-style">
        <div class="titlesuperscript">Presented by <a href="http://www.creativecrew.org/">Creative Crew</a></div>
        <h1><a href="#">Domain Generator</a></h1>
        <div class="line"></div>
        <div class="italic">A small web application using <a href="http://en.wikipedia.org/wiki/AJAX">AJAX</a>, <a href="http://www.json.org/">JSON</a>, and <a href="http://json-rpc.org/">JSON RPC</a>, the cutting edge web technologies. Powered by <a href="http://jquery.com/">jQuery</a>, <a href="http://www.php.net/">PHP</a>, and <a href="http://www.mysql.com/">MySQL</a>.</div>
<!-- BEGIN: Template Region Middle -->
        <div class="section">
            <h3>Create</h3>
            <div id="ajax-prefix-create-form" class="frmcommon">
                <div class="inputs"><label>Prefix</label><input type="text" id="ajax-prefix-create-txt" name="ajax-prefix-create-txt" class="txtcommon" value="" maxlength="16"/></div>
                <div class="controls"><div id="ajax-prefix-create-lod" class="loading">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div><input type="button" id="ajax-prefix-create-btn" class="btncommon" value="Add"/></div>
            </div>
            <div id="ajax-postfix-create-form" class="frmcommon">
                <div class="inputs"><label>Postfix</label><input type="text" id="ajax-postfix-create-txt" name="ajax-prefix-create-txt" class="txtcommon" value="" maxlength="16"/></div>
                <div class="controls"><div id="ajax-postfix-create-lod" class="loading">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div><input type="button" id="ajax-postfix-create-btn" class="btncommon" value="Add"/></div>
            </div>
        </div>
        <div class="section">
            <h3>View</h3>
            <div class="frmcommon">
                <div id="ajax-prefix-datatable"><table class="tbl">
                    <tr>
                        <th>Prefixes</th>
                        <th class="controls" style="width:1%;"><input type="button" id="ajax-prefix-datatable-refresh-btn" class="btncommon" value="List"/></th>
                    </tr>
                </table></div>
            </div>
            <div class="frmcommon">
                <div id="ajax-postfix-datatable"><table class="tbl">
                    <tr>
                        <th>Postfixes</th>
                        <th class="controls" style="width:1%;"><input type="button" id="ajax-postfix-datatable-refresh-btn" class="btncommon" value="List"/></th>
                    </tr>
                </table></div>
            </div>
        </div>
        <div class="section">
            <h3>Output</h3>
            <div id="ajax-expression-set-form" class="frmcommon">
                <div class="inputs"><label>Expression</label><input type="text" id="ajax-expression-set-txt" name="ajax-expression-set-txt" class="txtcommon" value="" maxlength="16"/></div>
                <div class="controls"><input type="button" id="ajax-expression-set-btn" class="btncommon" value="Set"/> <input type="reset" id="ajax-expression-clear-btn" class="btncommon" value="Clear"/></div>
            </div>
            <div id="ajax-generate-output-form" class="frmcommon">
                <div class="inputs"><label>Delimiter</label><input type="text" id="ajax-delimiter-set-txt" name="ajax-delimiter-set-txt" class="txtcommon" value="\n" maxlength="8"/></div>
                <div class="controls"><input type="button" id="ajax-delimiter-set-btn" class="btncommon" value="Set"/> <input type="reset" id="ajax-delimiter-clear-btn" class="btncommon" value="Clear"/></div>
                <div class="inputs"><label>Generator</label><textarea id="ajax-generate-output-txt" name="ajax-generate-output-txt" class="txtcommon" cols="80" rows="40" style="height:160px;"></textarea></div>
                <div class="controls"><div id="ajax-generate-output-lod" class="loading">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div><input type="button" id="ajax-generate-output-btn" class="btncommon" value="Generate"/> <input type="button" id="ajax-generate-check-btn" class="btncommon" value="Check"/></div>
                <div id="ajax-prefix-collection" style="display:none;"></div>
                <div id="ajax-postfix-collection" style="display:none;"></div>
            </div>
            <div class="hide">
                <form id="external-output-form" action="https://secure.registerapi.com/dds2/index.php" method="get">
                    <div><input type="hidden" name="action" value="check"/></div>
                    <div><input type="hidden" name="comtld" value="on"/></div>
                    <div><input type="hidden" size="15" name="siteid" value="4798"/></div>
                    <div><input type="hidden" name="AID" value="5463237"/></div>
                    <div><input type="hidden" name="PID" value="2558840"/></div>
                    <div><input type="hidden" id="external-output-form-domain" name="DomainName"/></div>
                </form>
            </div>
        </div>
        <div class="section">
            <h3>Debug</h3>
            <div style="min-height:192px;overflow:auto;">
                <div id="ajax-debug-output"></div>
                <div id="ajax-error-output"></div>
            </div>
        </div>
<!-- END: Template Region Middle -->
    </div>
    </div></div></div>
    </div><em class="sbtm"><em class="s4"></em><em class="s3"></em><em class="s2"></em><em class="s1"></em></em>
    <div class="credit center">Designed by <a href="http://www.babybluebox.com/" title="DieHard">William Chang</a></div>
    <div class="badges center"><ul>
        <li><a href="http://validator.w3.org/check?uri=referer" title="W3C XHTML Compliant"><img src="http://www.creativecrew.org/images/valid_xhtml_80x15.png" alt="W3C XHTML Compliant" title="W3C XHTML Compliant" height="15" width="80"/></a></li>
        <li><a href="http://jigsaw.w3.org/css-validator/validator?uri=http://www.williamchang.org/domaingenerator/" title="W3C CSS Compliant"><img src="http://www.creativecrew.org/images/valid_css_80x15.png" alt="W3C CSS Compliant" title="W3C CSS Compliant" height="15" width="80"/></a></li>
    </ul></div>
</div>
</body>
</html>