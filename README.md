<img src='https://media.giphy.com/media/4KEWkqAf1ViqSAxhab/giphy.gif' width=40%>

# FOODBANK
With this application you can add your recipes and see others.

# Code Review
Code Review by [Johanna Jönsson](https://github.com/JonssonJohanna) and [Sofia Rönnkvist](https://github.com/sofiaronnkvist)

1 login.php: There is error messages when trying to register, which is great, but not when trying to log in using the wrong credentials, perhaps add that.
2 login.php: Or use required on your input fields.
3 Great work with all the error messages and not being able to add new recipes without everything being filled in.
4 Can’t se that you have used any larval mix which was one of the criterias for this assignment.
5 dashboard.blade.php: The project does not include header or footer, which would make it easer to navigate in the application.
6 dashboard.blade.php: The project does not have a title, perhaps add that, it makes the project more personal.
7 It would be good if you had a seeder to access the database.
8 RegisterController.php: there is some code "use Illuminate\Support\Facades\Auth;" that you are not using, perhaps remove that to get cleaner code.
9 RegisterController.php: It was useful with the comments to get a better understanding of your code.
10 Web.php: Enjoyed how you have structured routes in web.php, makes it easier to understand what they do.
11 Update.blade.php: Since you have used comments in other files, perhaps for consistency use them in blade also for readability.
12 ProfileController.php: the request in the public function does not look like it is in use, perhaps remove them.
13 LikeRecipeController.php: You are not using this controller, how come?
14 Migrations/model: You have a migration for Likes but there is no where for users to like a recipe in your application, perhaps remove this.
15 Model/Likes: is empty.
16 Tests: You have done a great job with your tests.
17 Login.blade.php: You consistently use CSRF in all forms which is great.
18 Dashboard.blade.php: When users is not loged in you can still see all recipes, perhaps only make that visible when user is loged in.
19 app.scss: Impressed that you have included SASS in this project even though it was not a requirement.
20. Readme.md: It would be great to have installations instructions in readme.md.

Overall great work, really enjoyed creating recipes with your application!
