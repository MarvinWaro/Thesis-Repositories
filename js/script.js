let sidebar = document.querySelector(".sidebar-admin");
let sidebarBtn = document.querySelector(".sidebarBtn");

sidebarBtn.onclick = function () {
    sidebar.classList.toggle("active");
}


$(document).ready(function() {
    var table = $('#example').DataTable( {
        responsive: true
    } );
    new $.fn.dataTable.FixedHeader( table );
} );

/*Modal*/

const myModal = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', () => {
    myInput.focus()
})
