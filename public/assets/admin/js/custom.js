(function($){
    $(document).ready(function(){
        const myMultiSelect = document.getElementById('multiSelect')

        if (myMultiSelect) {
        new coreui.MultiSelect(myMultiSelect, {
            name: 'multiSelect',
            options: [
            {
                value: 0,
                text: 'Angular'
            },
            {
                value: 1,
                text: 'Bootstrap',
                selected: true
            },
            {
                value: 2,
                text: 'React.js',
                selected: true
            },
            {
                value: 3,
                text: 'Vue.js'
            },
            {
                label: 'backend',
                options: [
                {
                    value: 4,
                    text: 'Django'
                },
                {
                    value: 5,
                    text: 'Laravel'
                },
                {
                    value: 6,
                    text: 'Node.js',
                    selected: true
                }
                ]
            }
            ],
            search: true
        })
        }

        $(document).on('click','.delete-open', function() {
            $(this).siblings('.show-hide').show();
        });
        $(document).on('click','.no', function() {
            $(this).closest('.show-hide').hide();
        });









        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        $(document).on('click', '.edit_post_button', function(e) {
            e.preventDefault();

            let url = $(this).data('url');
            $.ajax({
                url,
                type: 'GET',
                contentType: false,
                processData: false,
                success: function(res) {
                    // $('.modal').addClass('show').css('display','block');
                    // $('.modal-body').html(e);
                    if (res.status == 200) {
                        $('.main-post-modal .modal-body').html(res.html);
                        $('.main-post-modal').modal('show');
                    }
                    console.log(res.html);
                },
                error: function(e) {
                    // console.log(e);
                }
            })
        });

        $('.btn-close').on('click', function() {
            $('.main-post-modal').modal('hide');
        });


        $(document).on('submit','.main_post_update_form',function(e) {
            e.preventDefault();

            var data = new FormData( $('.main_post_update_form')[0] );

            // console.log( data );

            $.ajax({
                url: $(this).data('url'),
                type: 'POST',
                contentType: false,
                processData: false,
                data: data,
                success: function(res) {
                    if( res.status === 200 ) {
                        $('.main-data-table').html(res.html);
                        // console.log(res.html);
                        $('.main-post-modal').modal('hide');
                    }
                },
                error: function(res){
                    console.log(res);
                }
            });
        });

        $(document).on('submit','.main_post_delete_form', function(e){
            e.preventDefault();

            var data = new FormData( $('.main_post_delete_form')[0] );

            $('.success-message').html(' ');

            $.ajax({
                type: 'POST',
                url: $(this).data('url'),
                data: data,
                processData: false,
                contentType: false,
                success: function(res){
                    if( res.status === 200 ) {
                        $('.main-data-table').html(res.html);
                        // console.log(res.html);
                        $('.main-post-modal').modal('hide');
                        $('.success-message').html('<h4 class="alert alert-danger">Deleted Successfully !!</h4>');
                    }
                },
                error: function(res) {
                    console.log(res);
                }
            });
        });


        // $(document).on('change','#myFile', function(e){
        //     $(this).closest('.upload-image').find('img').attr('src', $(this).val() );
        //     console.log( $(this).val() );
        // });
        // $('#myFile').show().child('img').attr('src', $('#myFile').val() ).show();





    });
}(jQuery));
