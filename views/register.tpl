<div class="register-page">
    <form method="post" id="register-form">
        <div>
            <h3>Username</h3>
            <p>
                You can use any characters (latin), numbers and underscore. The length should be between 5 and 10 characters.
            </p>
            <input type="text" maxlength="10" placeholder="Username" name="username" required />
        </div>
        <div>
            <h3>Password</h3>
            <p>
                You can use any characters (latin), numbers and underscore. The length should be between 6 and 15 characters.
            </p>
            <input type="password" maxlength="15" placeholder="Password" name="password" required />
        </div>
        <div>
            <h3>Repeat Password</h3>
            <p></p>
            <input type="password" maxlength="15" placeholder="Repeat password" name="repassword" required />
        </div>
        <div>
            <h3>E-mail</h3>
            <p>
                It will be used if you forget you password! Please use real email!
            </p>
            <input type="email" maxlength="50" placeholder="mail@example.com" name="mail" required />
        </div>
        <div>
            <h3>Secret Question</h3>
            <p>
                It will be used if you forget you password! Please remember it!
            </p>
            <select name="question" required>
                <option value="1">ASdasd asd sad 1</option>
                <option value="2">ASdasd asd sad 1</option>
                <option value="3">ASdasd asd sad 1</option>
            </select>
        </div>
        <div>
            <h3>Secret Answer</h3>
            <p>
                It will be used if you forget you password! Please remember it! The length should be between 5 and 10 characters.
            </p>
            <input type="text" maxlength="20" placeholder="Answer" name="answer" required />
        </div>
        <div>
            <h3>Are you a human?</h3>
            <p>
                Please enter the text from the image below to proove that you are a human.
            </p>
            <div style="width: 250px; text-align: center; padding: 50px 0; background-color: #000000; margin-bottom: 30px;">PLACEHOLDER</div>
            <input type="hidden" name="register-user" value="true" />
            <input type="text" class="small-input" name="antispam" maxlength="7" required />
        </div>
        <input type="submit" value="Register" />
    </form>
</div>
