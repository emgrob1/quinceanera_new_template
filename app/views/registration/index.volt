{{ form("/session/submit") }}
    <fieldset>
        <div>
        <label>Register</label><br/>
            <label for="username">
            Username
            </label>

            <div>
                {{ text_field("username") }}
            </div>
      
    
             

  <div>
            <label for="password">
                Password
            </label>

            <div>
                {{ password_field("password") }}
            </div>
        </div>


 <div>
            <label for="email">
                Email
            </label>

            <div>
                {{ text_field("email") }}
            </div>
        </div>
              <div>
              <input type = "hidden" name="active"   value="Y">
 		</div>

           
        </div>

        <div>
            {{ submit_button("Register") }}
        </div>
    </fieldset>
{{ endForm() }}