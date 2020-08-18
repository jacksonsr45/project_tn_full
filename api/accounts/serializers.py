from rest_framework import serializers

from phone_field import PhoneField

from rest_framework.response import Response

from .models import User

class UserSerializer(serializers.ModelSerializer ):

    class Meta:
        model = User
        fields = (
            'id',
            'url',
            'email',
            'full_name',
            'document_id',
            'year_of_birth',
            'phone_number',
            'groups'
        )

