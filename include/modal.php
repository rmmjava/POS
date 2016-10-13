<div class="modal fade" id="additem_modal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fa fa-tint"></i> Add Item</h3>
            </div>            
            <form action="data/item.php?p=additem" enctype="multipart/form-data" method="POST">
            <div class="modal-body">
                <div class="form-group input-group">
                    <span class="input-group-addon">Item Name </span>
                    <input type="text" autofocus name="name" class="form-control" required/>
                </div>
                <div class="form-group">
                    <label>Description:</label>
                    <textarea class="ckeditor" name="description"></textarea>
                </div>
                <div class="form-group input-group">
                    <span class="input-group-addon">Quantity</span>
                    <input type="number" min="0" name="qty" value="1" class="form-control"/>
                </div>
                <div class="form-group input-group">
                    <span class="input-group-addon">Units</span>
                    <input type="number" min="0" name="unit" value="1" class="form-control"/>
                    <span class="input-group-addon">
                        <select name="unitsign">
                            <option>Pcs.</option>
                            <option>Box</option>
                        </select>
                    </span>
                </div>
                <div class="form-group input-group">
                    <span class="input-group-addon">Remarks</span>
                    <select name="remarks" class="form-control">
                        <option>Functional</option>
                        <option>Not Functional</option>
                    </select>
                </div>
                <div class="form-group input-group">
                    <span class="input-group-addon">Supplier</span>
                    <select name="supplier" class="form-control">
                        <?php while($row = mysql_fetch_array($getsupplier)): ?>
                        <option><?php echo $row['name'];?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Picture</label>
                    <input type="file" name="image">
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary" data-dismiss="modal">Cancel</a>
                <input type="submit" value="Save" class="btn btn-success">                
            </div>
            </form>
        </div>
    </div>
</div>