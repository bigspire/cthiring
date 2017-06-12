<div class="row" style="margin-left:0px;">
<div class="span4">					   
<?php if($this->Paginator->counter('{:current}') > 0):?>
<div class="" id="dt_gal_info">

<?php
echo $this->Paginator->counter('Page <span>{:page}</span> of <span>{:pages}</span> <b>Total:</b> <span>{:count}</span>');
?>


</div> 
</div>



<div class="span8">
					   <div class="dataTables_paginate paging_bootstrap pagination">
					   <ul>
<?php if($this->Paginator->counter('{:page}') != 1): 

// Shows the next and previous links
echo $this->Paginator->first('<< First ', array('tag' => 'li'));

// Shows the next and previous links
echo $this->Paginator->prev('< Previous ',array('tag' => 'li'));

?>

<?php endif; ?>


<?php // Shows the page numbers
echo $this->Paginator->numbers(array('tag' => 'li', 'separator' => ' ', 'currentTag' => 'a', 'currentClass' => 'disabled'));
?>

<?php if($this->Paginator->counter('{:pages}') != $this->Paginator->counter('{:page}')): 

echo $this->Paginator->next(' Next >', array('tag' => 'li'));

echo $this->Paginator->last(' Last >>', array('tag' => 'li'));


?>


<?php endif; ?>
</ul>
</div>
</div>
</div>

<?php endif; ?>


