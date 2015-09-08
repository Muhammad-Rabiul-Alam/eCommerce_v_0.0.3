			
			            		<?php  
		            				if(!empty($data['confirmation'])){echo $data['confirmation'];}
		            				elseif(!empty($data['empty'])) echo "<div class='alert alert-danger'>".$data['empty']."</div>";
			            			
			            			if(empty($data)):
			            		?>
							  	<table class="table">
							  		<thead>
							  			<tr>
							  				<th>#</th>
							  				<th>Product Name</th>
							  				<th>Category</th>
							  				<th>Subcategory</th>
							  				<th>Product Type</th>
							  				<th>Unit Price</th>
							  				<th>Added On</th>
							  				<th>Edit</th>
							  				<th>Delete</th>
							  			</tr>
							  		</thead>
							  		<tbody>
							  			<?php foreach($res as $table_item): ?>
								  			<?php
								  				$pt_id=$table_item['product_type_id'];
								  				$product_type_name=find_product_type_name($pt_id);
								  				$subcategory_name=find_subcategory_name($pt_id);
								  				$category_name=find_category_name($pt_id);
								  			?>
								  			<tr>
								  				<td><?= $table_item['product_id'] ?></td>
								  				<td><?= $table_item['product_name'] ?></td>
								  				<td><?= $category_name['category_name'] ?></td>
								  				<td><?= $subcategory_name['subcategory_name'] ?></td>
								  				<td><?= $product_type_name['product_type_name'] ?></td>
								  				<td><?= $table_item['unit_price'] ?></td>
								  				<td><?= $table_item['date_added'] ?></td>
								  				<td><a class="btn btn-info btn-xs" href='update_product.php?product_id=<?= $table_item['product_id'] ?>'>edit</a></td>
								  				<td><a class="btn btn-warning btn-xs" href='index.php?deleteproduct_id=<?= $table_item['product_id'] ?>'>delete</a></td>
								  			</tr>
								  		<?php endforeach; ?>
							  		</tbody>
							  	</table>
							  	<hr>
							  	<?php  include "../views/paginate.view.php"; endif;?>
							  
	                    
	        