 <?php 
 $spKey = 'spSearch' . uniqid();
 ?>
 <div class="spSearchBar" data-key="<?php echo $spKey;?>">
     <div class="spSearchWraper">
         <div class="spSearchBar">
             <div class="spSearchInputBox">
                 <input id="<?php echo $spKey;?>" class="spSearchInput" type="text" placeholder="Search" />
             </div>
             <div class="spSearchInputBTN">
                 <button class="spSearchButton" data-key="<?php echo $spKey;?>" type="submit">Search</button>
             </div>
         </div>
         <div class="spSearchResult" id="<?php echo $spKey.'result';?>">

         </div>
     </div>
 </div>