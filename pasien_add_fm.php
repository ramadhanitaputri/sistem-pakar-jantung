<div class="art-post">
<div class="art-post-body">
<div class="art-post-inner art-article">
<h2 class="art-postheader">Data Pengguna</h2>
<div class="art-postcontent">

<script type="text/javascript">
$(document).ready(function(){
	$("#TxtNama").focus();
	})
function validasi(form){
	if(form.TxtNama.value==""){
		alert("Masukkan nama !");
		form.TxtNama.focus(); return false;
		}else if(form.cbojk.value==0){
		alert("Masukkan jenis kelamin !");
		form.cbojk.focus(); return false;	
		}else if(form.TxtUmur.value==""){
			alert("Masukkan umur anda !");
			form.TxtUmur.focus(); return false;
			}else if(form.TxtAlamat.value==""){
				alert("Masukkan alamat anda !");
				form.TxtAlamat.focus(); return false;
				}else if(form.textemail.value==""){
					alert("Masukkan email !");
					form.textemail.focus(); return false;
					}
		form.submit();
	}
</script>
<form onSubmit="return validasi(this)" method="post" name="form1" target="_self" action="?top=pasienaddsim.php">
<table class="tab" width="415" style="border:0px;"  border="0" align="center">
    <tr> 
      <td colspan="2"><div align="center"></div></td>
    </tr>
    <tr> 
      <td>Nama</td>
      <td> 
      <input name="TxtNama" id="TxtNama" type="text" size="35" maxlength="30"></td>
    </tr>
    <tr> 
      <td>Kelamin</td>
      <td> 
      <select name="cbojk" id="cbojk">
      <option value="0" selected="selected">- Jenis Kelamin -</option>
      <option value="Laki-laki">Laki-laki</option>
      <option value="Wanita">Wanita</option>
      </select>
      </td>
    </tr>
    <tr> 
      <td>Umur</td>
      <td> 
      <input name="TxtUmur" id="TxtUmur" type="text" size="2" maxlength="3"></td>
    </tr>
    <tr> 
      <td width="76">Alamat</td>
      <td width="312"> 
      <input name="TxtAlamat" id="TxtAlamat" type="text" size="35" maxlength="60"></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="text" name="textemail" id="textemail" size="25" maxlength="25"></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Daftar">
        <input type="reset" name="Submit2" value="Reset" /></td>
    </tr>
  </table>
</form>

      </div>
                <div class="cleared"></div>
                </div>

		<div class="cleared"></div>
    </div>
</div>
