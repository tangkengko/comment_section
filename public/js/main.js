$(document).ready(function()
{
    $(document).on('click','.reply',function()
    {
        let reply_obj = $(this);
        let reply_data = reply_obj.data();
        
        $('#reply_modal').dialog({
            autoOpen: false,
            modal: true,
            open:function()
            {
                $(this).find('input:visible').val('');

                $(this).find('#dialog_parent_id').val(reply_data.parent_id);
                $(this).find('#dialog_level').val(reply_data.level);
            },
            buttons: [
                {
                    text: "Enter Comment",
                    class: "btn btn-primary",
                    click: function() {
                      $( this ).dialog( "close" );

                      $.post('/',$(this).find('input').serialize(),function(view)
                      { 

                        if(reply_data.par=="add")
                        {
                            $('.comment_section').prepend(view);
                        }
                        else{
                            reply_obj.closest('.row').next('.comment_container').prepend(view);
                        }
                      },'html')
                    }
                },
                {
                    text: "Cancel",
                    class: "btn btn-danger",
                    click: function() {
                        $(this).find('input').val('');
                        $( this ).dialog( "close" );
                    }
                }
            ]
        }).dialog( "open" );;
        
    })
})
console.log('testing logs');
