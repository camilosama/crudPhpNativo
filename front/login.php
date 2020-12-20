<div class="card mt-3">
    <div class="text-center">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3Mclb0NdAfReSwkqWDtxIh2Oc4vEyPMYzeg&usqp=CAU" class="card-img-top" style="width : 40%">
        <div class="card-body">
            <form name="frmAdd" id="frmAdd" method="post" enctype="multipart/form-data">

                <div class="mb-3 row">
                <label for="pw" class="col-sm-2 col-form-label">Email*</label>
                    <div class="col-sm-10">
                    <input type="email" class="form-control" id="usr" name="usr">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="pw" class="col-sm-2 col-form-label">Password*</label>
                    <div class="col-sm-10">
                    <input type="password" class="form-control" id="pw" name="pw">
                    </div>
                </div>

                <div>
                    <button type="button" class="btn btn-primary btn-block" onClick="validarLogin()">Ingresar</button>   
                </div>
        
            </form>


        </div>
    </div>
</div>