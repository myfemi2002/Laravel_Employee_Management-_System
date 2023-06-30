
            $(function(){
            $(document).on('click', '#delete', function(e){
            e.preventDefault();
            var link = $(this).attr("href");

            Swal.fire({
                title: 'Are you sure?',
                        text: "Delete This Data!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
            Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
            }
            })
            });
            });


            $(function(){

                $(document).on('click','#ApproveBtn',function(e){
                e.preventDefault();
                var link = $(this).attr("href");

            Swal.fire({
                            // title: 'Are you sure?',
                            title:"You Can't Decline This Request After Approval",
                            text: "Approve This Data?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, Approve it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                            window.location.href = link
                            Swal.fire(
                                'Approved!',
                                'Request Approved.',
                                'success'
                    )
            }
            })
            });
            });


            $(function(){

                $(document).on('click','#DeclineBtn',function(e){
                e.preventDefault();
                var link = $(this).attr("href");

            Swal.fire({
                            // title: 'Are you sure?',
                            title:"You Can't Approval This Request After Decline",
                            text: "Decline This Data?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, Decline it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                            window.location.href = link
                            Swal.fire(
                                'Decline!',
                                'Request Decline.',
                                'success'
                    )
            }
            })
            });
            });


            $(function(){

                $(document).on('click','#ActivateBtn',function(e){
                e.preventDefault();
                var link = $(this).attr("href");

            Swal.fire({
                            title: 'Are you sure?',
                            text: "Activate Staff?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, Activate Staff!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                            window.location.href = link
                            Swal.fire(
                                'Activate!',
                                'Staff Activated.',
                                'success'
                    )
            }
            })
            });
            });


            $(function(){

                $(document).on('click','#DeactivateBtn',function(e){
                e.preventDefault();
                var link = $(this).attr("href");

            Swal.fire({
                            title: 'Are you sure?',
                            text: "Deactivate Staff?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, Deactivate Staff!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                            window.location.href = link
                            Swal.fire(
                                'Deactivate!',
                                'Staff Deactivated.',
                                'success'
                    )
            }
            })
            });
            });
            


            $(function(){

                $(document).on('click','#SuspendBtn',function(e){
                e.preventDefault();
                var link = $(this).attr("href");

            Swal.fire({
                            title: 'Are you sure?',
                            text: "Suspend Vendor?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, Suspend Vendor!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                            window.location.href = link
                            Swal.fire(
                                'Suspend!',
                                'Vendor Suspended.',
                                'success'
                    )
            }
            })
            });
            });