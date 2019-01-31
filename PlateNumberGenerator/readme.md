<h1>Language PHP (Laravel framework) with user authentication</h1>
    
<p>
    User needs to be authenticated to access the the plate number generating page and also be able to see all plates that have been     generated
</p>

<p>User can can filter generated plate numbers using LGA as search criteria</p>

<h2>API Docs(Tested with postman)</h2>
<p>All Api resources comes from App\Http\Resources\plateNumbers.php and App\Http\controller\Platenumbersapicontroller.php</p>
<p>Plate number(s) can be registered using the following endpoint http://yourdomain.com/api/plate-number</p>
<p>All generated plate numbers can be viewed using the endpoint http://yourdomain.com/api/all-plate-numbers</p>
