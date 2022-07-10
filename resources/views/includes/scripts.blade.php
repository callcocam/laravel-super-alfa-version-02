<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('assets/admin/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('assets/admin/vendors/choices.js/choices.min.js') }}"></script>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
<script src="{{ asset('assets/admin/js/main.js') }}"></script>
<script src="{{ asset('js/autosize.min.js') }}"></script>
<script>

    // window.addEventListener('closeModalForms', function (e) {
    //     console.log('closeModalForms')
    //     var myModalEl = document.getElementById(e.detail)
    //     var modal = bootstrap.Modal.getInstance(myModalEl)
    //     modal.hide()
    // })

    window.addEventListener('closeModalForm', function (e) {
        var myModalEl = document.getElementById(e.detail)
        var modal = bootstrap.Modal.getInstance(myModalEl)
        modal.hide()
    })

    window.addEventListener('openModalForm', function (e) {
        var myModal = new bootstrap.Modal(document.getElementById(e.detail), {
            keyboard: false,
            backdrop: 'static',
        })
        myModal.show()
    })
    window.addEventListener('select2', function (e) {
        console.log(e.detail)
        $(e.detail).select2();
        $(e.detail).on('change', function (e) {
            let data = $(e.detail).select2("val");
            Livewire.on('setSelectValue', data)
        })
    })
</script>

