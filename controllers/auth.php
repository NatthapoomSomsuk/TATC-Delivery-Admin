<?php
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sqlemp = "SELECT * FROM employee WHERE username='$username' AND password='$password'";
    $sql_emp = mysqli_query($conn, $sqlemp);
    $emp_data = mysqli_fetch_assoc($sql_emp);
    if ($emp_data) {
        if($emp_data['statuslevel_id'] == 99){
            $_SESSION['emp'] = $user_data['emp_id'];
            header("Location:?page=home" . $user_data['emp_id']);
        }else{
            ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                timer: 1500,
                text: 'ชื่อผู้ใชเงานนี้ไม่ได้เป็นผู้ดูแล',
            })
        </script>
        <?php
        }
       
    }else {
        ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                timer: 1500,
                text: 'รหัสผ่านไม่ถูกต้อง',
            })
        </script>
        <?php
    }
}