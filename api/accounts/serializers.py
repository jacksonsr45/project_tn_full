from rest_framework import serializers
from django.db.models import Avg

from phone_field import PhoneField

from rest_framework.response import Response

from .models import User

class UserSerializer(serializers.ModelSerializer):
    
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
            'groups',
            'is_active',
            'is_staff',
            'is_admin',
        )
