from django.shortcuts import render
from rest_framework import viewsets
from .models import NumberPlate
from django.shortcuts import redirect, HttpResponseRedirect
from .serializers import ViewPlateNumbersSerializer
from django.utils import timezone
from django.core.paginator import Paginator


class ViewPlateNumbers(viewsets.ModelViewSet):
    serializer_class = ViewPlateNumbersSerializer
    queryset = NumberPlate.objects.all()


def number_plate_generator_page(request):

    numbers = NumberPlate.objects.all()

    context = {
        "title": "Number Plate Generator Page",
        "number_plate": ""
    }

    # Algorithm
    # Check the database for the current number [1 - 999]

    # Display the values number plates

    # context["number_plate"] = number.lga_code + \
    #     "" + str(number.number) + "" + number.alphabet

    # number_plate = LGACODE + [1-999] +[AA - BB]
    # get the LGA code from the form
    # check the database to confirm the current number
    # increase the current number by 1 if and only if it's less than 999
    # if the last number current number is 999 start from 001
    # check alphabet if the last alphabet is ZZ then start from AA else check if alphabet is AB

    # insert it into the database

    if request.method == "POST":
         # get the LGA code and the number of plate number to generate from the form
        lga_code = request.POST["lga"]

        number_of_plate_numbers = request.POST['numberOfPlates']

        # Check the database for the current number [1 - 999]
        numbers = NumberPlate.objects.filter()

        # Display the values number plates
        for number in numbers:
            context["number_plate"] = numbers
        #loop generate i number of plates
        for i in range(int(number_of_plate_numbers)):
            latest = numbers.latest('number').number < 999
            if latest:
                newNumber = numbers.latest("number").number+1
            else:
                newNumber = 1

            # get the next suffix the first suffix is AA by default if
            default_suffix = NumberPlate.objects.filter().latest("number").alphabet
            if default_suffix == "ZZ":
                newsuffix = "AA"
            else:
                next_suffix = default_suffix[1] + chr(ord(default_suffix[0])+1)

            NumberPlate(
                name="Bassey",
                lga_code=lga_code,
                number=newNumber,
                alphabet=next_suffix,
                date_created=timezone.now(),
            ).save()

    return render(request, 'numberplatesgenerator/number_generator.html', context)


def login_page(request):
    context = {
        "title": "Login Page",
        "result": ""
    }

    if request.method == "POST":
        if request.POST['username'] == "admin" and request.POST['password'] == "admin":
            return HttpResponseRedirect("generator")
        else:
            context['result'] = "Login failed! Please, try again."
    return render(request, 'numberplatesgenerator/login.html', context)


def report_page(request):

    context = {
        "title": "Number Report Page",
        "number_plate": ""
    }

    # capture the data from the select box and push and check for the data in the database that matches it in the database
    if request.method == "POST":
        lga = request.POST['lga']
        numbers = NumberPlate.objects.filter(lga_code=lga)
        paginator = Paginator(numbers, 10)

        context['number_plate'] = numbers

    return render(request, 'numberplatesgenerator/report.html', context)
