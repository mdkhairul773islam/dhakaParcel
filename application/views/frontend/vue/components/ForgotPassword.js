export default {
	name 	 : 'ForgotPassword',
	template : `
<div class="form_div">
    <h2>Password Reset</h2>
    <p>{{msg}}</p>
    <form action="#" @submit.prevent="submit()" method="post">
        <div class="form-group" v-if="is_mobile">
            <input type="text" v-model="mobile" id="mobile" placeholder="Enter Your Phone Number" class="form-control" autocomplete="off">
            <label for="mobile">Mobile phone number</label>
        </div>
        <div class="form-group" v-if="is_code">
            <input type="text" v-model="code" id="code" placeholder="Verification Code" class="form-control" autocomplete="off">
            <label for="code">Verification Code</label>
        </div>
        <div v-if="is_password">
        	<div class="form-group">
	            <input type="password" v-model="password" id="password" placeholder="Password" class="form-control" autocomplete="off">
	            <label for="password">Password</label>
	        </div>

        	<div class="form-group">
	            <input type="password" v-model="confirm_password" id="confirm_password" placeholder="Confirm Password" class="form-control" autocomplete="off">
	            <label for="confirm_password">Confirm Password</label>
	        </div>
        </div>
        <button type="submit" class="btn" @click="sendCode()" v-if="is_mobile">Send Code</button>
        <button type="submit" class="btn" @click="codeVerify()" v-if="is_code">Verify</button>
        <button type="submit" class="btn" @click="changePassword()" v-if="is_password">Change</button>
    </form>
</div>

	`,
	data() {
		return {
			url 	: '',
			msg     : 'Enter the mobile or phone number associated with your account.',
			mobile 	: '',
			code    : '',
			is_code : false,

			is_mobile   : true,
			is_password : false,
			password 	: '',

			confirm_password : '',
		}
	},
	mounted(){
		this.url = this.$store.state.url;
	},
	methods:{
		submit:function(){

		},
		sendCode:function(){
			if(this.mobile!=''){
				axios.post(this.url+'forgot', makeFormData({mobile:this.mobile}))
				.then(response=>{
					if(response.data==1){
						this.is_mobile = false;
						this.is_code   = true;
						this.msg 	   = 'Enter Verification Code For Verification Your Number';
					}
					else {
						this.msg = 'Enter A Valide Number';
					}
				})
				.catch(err=>console.log(err));
			}
		},
		codeVerify:function(){
			if(this.code!=''){
				axios.post(this.url+'forgot', makeFormData({code:this.code, mobile:this.mobile}))
				.then(response=>{
					if(response.data==1){
						this.msg = 'Enter New Password';
						this.is_mobile   = false;
						this.is_code     = false;
						this.is_password = true;
					}
					else {
						this.msg = 'Enter A Valide Code';
					}
				})
				.catch(err=>console.log(err));
			}
		},
		changePassword:function(){
			if(this.password==this.confirm_password){
				axios.post(this.url+'forgot', makeFormData({code:this.code, mobile:this.mobile, password:this.password}))
				.then(response=>{
					if(response.data==1){
						window.location.href = this.url+'login?user='+this.mobile;
					}
				})
				.catch(err=>console.log(err));
			}
			else {
				this.msg = 'Password And Confirm Password Is Not Same!!';
			}
		}
	}

}
