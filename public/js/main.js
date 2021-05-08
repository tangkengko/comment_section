$(document).ready(function()
{
    $('.reply').click(function()
    {
        let reply_data = $(this).data();
        $('#reply_modal').dialog({
            autoOpen: false,
            modal: true,
            open:function()
            {
                $(this).find('#dialog_parent_id').val(reply_data.parent_id);
                $(this).find('#dialog_level').val(reply_data.level);
            },
            buttons: [
                {
                    text: "Enter Comment",
                    class: "btn btn-primary",
                    click: function() {
                      $( this ).dialog( "close" );

                      $.post('/',$(this).find('input').serialize(),function(data)
                      {
                          alert(data.message);
                          if(data.status)
                          {
                            location.reload();
                          }
                      })
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
