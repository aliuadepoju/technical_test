from django.db import models
from django.utils import timezone


class NumberPlate(models.Model):
    name = models.CharField(max_length=200)
    lga_code = models.CharField(max_length=200)
    number = models.IntegerField()
    alphabet = models.CharField(max_length=100)
    date_created = models.DateTimeField(default=timezone.now)

    def __str__(self):
        return self.name
