<style type="text/css">
.design-name{
  color:red;
}
.avatar-upload {
  position: relative;
  max-width: 205px;
  margin: 50px auto;
}
.avatar-upload .avatar-edit {
  position: absolute;
  right: 12px;
  z-index: 1;
  top: 10px;
}
.avatar-upload .avatar-edit input {
  display: none;
}
.avatar-upload .avatar-edit input + label {
  display: inline-block;
  width: 34px;
  height: 34px;
  margin-bottom: 0;
  border-radius: 100%;
  background: #FFFFFF;
  border: 1px solid transparent;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
  cursor: pointer;
  font-weight: normal;
  transition: all 0.2s ease-in-out;
}
.avatar-upload .avatar-edit input + label:hover {
  background: #f1f1f1;
  border-color: #d6d6d6;
}
.avatar-upload .avatar-edit input + label:after {
  content: "\f040";
  font-family: 'FontAwesome';
  color: #1e1e1e;
  position: absolute;
  top: 5px;
  left: 0;
  right: 0;
  text-align: center;
  margin: auto;
}
.avatar-upload .avatar-preview {
  width: 192px;
  height: 192px;
  position: relative;
  border-radius: 100%;
  border: 6px solid #1e1e1e;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}
.avatar-upload .avatar-preview > div {
  width: 100%;
  height: 100%;
  border-radius: 100%;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}

}

</style>



<script type="text/javascript">
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
    console.log( readURL(this));
});

</script>  





<style>
  
  .progress-table-wrap {
  overflow-x: scroll; }
.progress-table {
  background-color: #222222;
  padding: 15px 5px 15px 5px;
  min-width: 800px; }
  .progress-table .Id {
    text-align: center;
    width: 10.07%; }
  .progress-table .Date {
    text-align: center;
    width: 19.07%; }
  .progress-table .Total {
    text-align: center;
    width: 12.74%; }
  .Payment{
    text-align: center;
    width: 19.74%; }
  .Reason{
    text-align: center;
    width: 19.74%;
  }
  .Invoice{
    text-align: center;
    width: 19.74%; }
  .Status{
    text-align: center;
    width: 19.74%; }
  .Action{
    text-align: center;
    width: 19.74%; }
  .progress-table .percentage {
    width: 40.36%;
    padding-right: 50px; }
  .progress-table .table-head {
    display: flex; }
    .progress-table .table-head .ID, .progress-table .table-head , .progress-table .table-head .Total .Invoice .Status .Action, .progress-table .table-head .percentage {
      padding-bottom: 8px;
      color: #fff;
      line-height: 40px;
      text-transform: uppercase;
      font-weight: 500; }
  .progress-table .table-row {
    padding: 15px 0;
    border-top: 1px solid #edf3fd;
    display: flex; }
    .progress-table .table-row .ID, .progress-table .table-row , .progress-table .table-row .Total .Invoice .Status .Action, .progress-table .table-row .percentage {
      background-color: white;
      display: flex;
      align-items: center; }
    .progress-table .table-row  img {
      margin-right: 15px; }
    .progress-table .table-row .percentage .progress {
      width: 80%;
      border-radius: 0px;
      background: transparent; }
      .progress-table .table-row .percentage .progress .progress-bar {
        height: 5px;
        line-height: 5px; }
        .progress-table .table-row .percentage .progress .progress-bar.color-1 {
          background-color: #6382e6; }
        .progress-table .table-row .percentage .progress .progress-bar.color-2 {
          background-color: #e66686; }
        .progress-table .table-row .percentage .progress .progress-bar.color-3 {
          background-color: #f09359; }
        .progress-table .table-row .percentage .progress .progress-bar.color-4 {
          background-color: #73fbaf; }
        .progress-table .table-row .percentage .progress .progress-bar.color-5 {
          background-color: #73fbaf; }
        .progress-table .table-row .percentage .progress .progress-bar.color-6 {
          background-color: #6382e6; }
        .progress-table .table-row .percentage .progress .progress-bar.color-7 {
          background-color: #a367e7; }
        .progress-table .table-row .percentage .progress .progress-bar.color-8 {
          background-color: #e66686; }


</style>