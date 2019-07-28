<footer class="sticky-footer">
    <div class="container">
        <div class="text-center">
            <small>Copyright © University of Bamenda 2018</small>
        </div>
    </div>
</footer>

<!-- jQuery CDN -->
<script src="../js/jquery-3.1.1.min.js"></script>
<script src="../js/jquery.easing.min.js"></script>
<!-- Bootstrap Js CDN -->
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/sb-admin.min.js"></script>
<script src="../js/sweetalert.min.js"></script>
<script>
    $(document).ready(function() {

        $("#saveStudent").click(function(e) {
            e.preventDefault();
            // Declaration of variables
            var matricule = $.trim($('input[name="matricule"]').val());
            var birthdate = $("#birthdate").val();
            var gender = $("#gender").val();
            var designation = $("#designation").val();
            var names = $.trim($('input[name="names"]').val());
            var contactno = $.trim($('input[name="contactno"]').val());
            var email = $.trim($('input[name="email"]').val());
            var cycle = $("#cycle").val();
            var schoolId = $("#schoolId").val();
            var departId = $("#department").val();

            $.ajax({
                type: "POST",
                url: "studentInfo.php",
                data: {matricule: matricule,
                    birthdate: birthdate,
                    gender: gender,
                    designation: designation,
                    names: names,
                    contactno: contactno,
                    email: email,
                    cycle: cycle,
                    schoolId: schoolId,
                    departId: departId}
            })
                .done(function(res) {
                    if (res == 1) {
                        swal({
                            text: "Successfuly Added",
                            icon: "success"
                        })
                    }
                    else {
                        swal({
                            text: "Error of insertion student Informations",
                            icon: "error"
                        })
                    }
                })
        })
    });

    function getDepartment(val) {
        $.ajax({
            type: 'POST',
            url: 'getDepartment.php',
            data: 'depart_id='+val,
            success: function (data) {
                 $("#department").html(data);
            }
        })
    }
</script>
</body>
</html>