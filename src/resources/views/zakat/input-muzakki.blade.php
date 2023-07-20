							@if(isset($muzakki))
							<input type="hidden" name="cek" value="old">
							<input type="hidden" name="idm" value="{{base64_encode($muzakki->id)}}">
                    		<div class="form-group form-float">
                    			<div class="form-line">
                    				<input type="text" name="nama" id="nm" class="form-control" required="" value="{{$muzakki->name}}">
                    				<label class="form-label">Nama Muzakki</label>
                    			</div>
                    		</div>
                    		<div class="form-group form-float">
                    			<div class="form-line">
                    				<input type="email" id="tp" name="email" class="form-control" value="{{$muzakki->email}}">
                    				<label class="form-label">E-Mail</label>
                    			</div>
                    		</div>
                    		<div class="form-group form-float">
                    			<div class="form-line">
                    				<textarea name="alamat" id="al" rows="4" cols="30" class="form-control no-resize" required="">{{$muzakki->alamat}}</textarea>
                    				<label class="form-label">Alamat</label>
                    			</div>
                    		</div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="tp" name="noHP" class="form-control only-num" maxlength="16" value="{{$muzakki->nohp}}">
                                    <label class="form-label">Nomor Handphone</label>
                                </div>
                            </div>
                    		<div class="form-group form-float">
                    			<input type="radio" name="kelamin" id="laki-laki" class="with-gap" value="L" required=""
								@if($muzakki->jeniskelamin=="L")
								checked
								@endif
								>
                    			<label class="form-label" for="laki-laki">Laki-laki</label>

                    			<input type="radio" name="kelamin" id="perempuan" class="with-gap" value="P"
								@if($muzakki->jeniskelamin=="P")
								checked
								@endif
								>
                    			<label class="form-label" for="perempuan">Perempuan</label>
                    		</div>
							@else
							<input type="hidden" name="cek" value="new">
                    		<div class="form-group form-float">
                    			<div class="form-line">
                    				<input type="text" name="nama" id="nm" class="form-control" required="" autofocus="">
                    				<label class="form-label">Nama Muzakki</label>
                    			</div>
                    		</div>
                    		<div class="form-group form-float">
                    			<div class="form-line">
                    				<input type="email" id="tp" name="email" class="form-control">
                    				<label class="form-label">E-Mail</label>
                    			</div>
                    		</div>
                    		<div class="form-group form-float">
                    			<div class="form-line">
                    				<textarea name="alamat" id="al" rows="4" cols="30" class="form-control no-resize" required=""></textarea>
                    				<label class="form-label">Alamat</label>
                    			</div>
                    		</div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="tp" name="noHP" class="form-control only-num" maxlength="16">
                                    <label class="form-label">Nomor Handphone</label>
                                </div>
                            </div>
                    		<div class="form-group form-float">
                    			<input type="radio" name="kelamin" id="laki-laki" class="with-gap" value="L" required="">
                    			<label class="form-label" for="laki-laki">Laki-laki</label>

                    			<input type="radio" name="kelamin" id="perempuan" class="with-gap" value="P">
                    			<label class="form-label" for="perempuan">Perempuan</label>
                    		</div>
							@endif