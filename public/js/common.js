function deleteAlert(e){
  if(!window.confirm('Do you really want to delete it ?')){
     window.alert('Canceled.'); 
     return false;
  }
  document.deleteform.submit();
};