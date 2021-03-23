<?php
session_start();
 // 	print_r($_SESSION);
 // echo session_id();

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<title>Invoice</title>
		<link
			href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap"
			rel="stylesheet"
		/>	
		<link rel="stylesheet" type="text/css" href="assets/css/custom.css">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    	<script type="text/javascript" src="assets/js/custom.js"></script>
		
	</head>
	<body>
		<div class="container">
			<div class="inv-title">
				<h1>Invoice # 00001</h1>
			</div>

			<div class="inv-header">
				<div>
					<h2>Customer</h2>
					<ul>
						<li>Street Address, Zipcode</li>
						<li>Country</li>
						<li>Phone No | email</li>
					</ul>
				</div>
				<div>
					<table>
						<tr>
							<th>Issue Date</th>
							<td><?php echo date('d-m-Y')?></td>
						</tr>
						<tr>
							<th>Due Date</th>
							<td><?php echo date('d-m-Y',strtotime('+7 days'))?></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="inv-body">
				<table>
					<thead>
						<th>Item</th>
						<th>Quantity</th>
						<th>Unit Price</th>
						<th>Tax</th>
						<th>Line Total</th>
						<th class="no-print"></th>
					</thead>
					<?php if(isset($_SESSION['cart_content'])){
							$sub_total_without_tax = 0;
							$sub_total_with_tax = 0;
							$total_amount = 0;
					 ?>
					<tbody>
						<?php foreach($_SESSION['cart_content']['items'] as $item){
							$sub_total_without_tax += $item['line_total'];
							$sub_total_with_tax += $item['line_total'] + $item['line_tax'];
							$total_amount = $sub_total_with_tax;
							?>
						<tr>
							<td><?php echo $item['name'];?></td>
							<td><?php echo $item['quantity'];?></td>
							<td>$ <?php echo number_format($item['price'],2);?></td>
							<td><?php echo $item['tax'];?>%</td>
							<td>$ <?php echo number_format($item['line_total']+$item['line_tax'],2);?></td>
							<td class="no-print"></td>
						</tr>
						<?php }?>
					</tbody>
					<?php } ?>
					<tfoot class="no-print">
						<tr>
							<td>
								<input type="text" id="item" />
							</td>
							<td><input type="number" id="quantity" min="1" /></td>
							<td><input type="number" id="price" /></td>
							<td>
								<select id="tax">
									<option value="0">0%</option>
									<option value="1">1%</option>
									<option value="5">5%</option>
									<option value="10">10%</option>
								</select>
							</td>
							<td><input disabled="" type="text" id="line-total"></td>
							<td><button disabled="" id="add-item">Add Item</button></td>
						</tr>
						
					</tfoot>
				</table>
			</div>
			<div class="inv-footer">
				<div><!-- required --></div>
				<div>
					<table class="total-table">
						<tr>
							<th>Sub total without tax</th>
							<td><input type="hidden" id="sub-total" value="<?php echo @$sub_total_without_tax;?>"/>
							<span>$<?php echo number_format(@$sub_total_without_tax,2);?></span>
							</td>
						</tr>
						<tr>
							<th>Discount Amount</th>
							<td><input type="number" id="discount" value="0"></td>
						</tr>
						<tr>
							<th>Sub total with tax</th>
							<td><input  disabled="" type="hidden" id="sub-total-tax" value="<?php echo @$sub_total_with_tax;?>" /><span>$<?php echo number_format(@$sub_total_with_tax,2);?></span></td>
						</tr>
						<tr id="total-amount-tr" style="display: none;">
							<th>Total Amount</th>
							<td><span id="total-amount-span">$<?php echo number_format(@$sub_total_with_tax,2);?></span></td>
						</tr>
					</table>
				</div>
			</div>
			<?php if(isset($_SESSION['cart_content'])){ ?>
			<center>
				<button class="no-print" id="generate-inv">Generate Invoice</button>
				<button class="no-print" id="clear-cart">Clear</button>
			</center>
			<?php } ?>
		</div>
	</body>
</html>