
<textarea id="markItUp" cols="80" rows="20">
&lt;h1&gt;Welcome on markItUp!&lt;/h1&gt;

&lt;p&gt;&lt;strong&gt;markItUp!&lt;/strong&gt; is a JavaScript plugin built on the jQuery library. It allows you to turn any textarea into a markup editor. Html, Textile, Wiki Syntax, Markdown, BBcode or even your own markup system can be easily implemented.&lt;/p&gt;
</textarea>

<script type="text/javascript">
    $(function() {
        // Add markItUp! to your textarea in one line
        // $('textarea').markItUp( { Settings }, { OptionalExtraSettings } );
        $('#markItUp').markItUp(mySettings);



        // You can add content from anywhere in your page
        // $.markItUp( { Settings } );
        $('.add').click(function() {
            $('#markItUp').markItUp('insert',
                { 	openWith:'<opening tag>',
                    closeWith:'<\/closing tag>',
                    placeHolder:"New content"
                }
            );
            return false;
        });

        // And you can add/remove markItUp! whenever you want
        // $(textarea).markItUpRemove();
        $('.toggle').click(function() {
            if ($("#markItUp.markItUpEditor").length === 1) {
                $("#markItUp").markItUp('remove');
                $("span", this).text("get markItUp! back");
            } else {
                $('#markItUp').markItUp(mySettings);
                $("span", this).text("remove markItUp!");
            }
            return false;
        });
    });
</script>
