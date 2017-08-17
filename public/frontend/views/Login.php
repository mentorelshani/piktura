<div class="frmLogin" >
  <h3>Log in to Task</h3>	
  <form ng-submit="btnLogin1(user)">
    <label >Username</label><br>
    <input class="txtInputLogin" type="text" id="fname" placeholder="Username" ng-model="user.Username" ng-show="a1"><br>

    <label >Password</label><br>
    <input class="txtInputLogin" type="password" id="lname" placeholder="Password" ng-model="user.Password"><br>
    <input   class="btnLogIn" type="submit"  value="Submit">
 <!-- 	 <input  class="btnLogIn" type="submit" value="Submit"> -->
  </form>

  <label>New to Task ?<a href="/signup" class="signup"> Sign up new>></a></label>
</div>