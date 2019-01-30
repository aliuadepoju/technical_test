from rest_framework import serializers
from .models import NumberPlate


class ViewPlateNumbersSerializer(serializers.ModelSerializer):
    """ This is the serializer class that serializes the database data to json """
    class Meta:
        model = NumberPlate
        fields = "__all__"
