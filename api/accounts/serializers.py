from rest_framework import serializers
from django.db.models import Sum

from rest_framework.response import Response

from .models import User

class UserSerializer(serializers.ModelSerializer):
    class Meta:
        model = User
        fields = (
            'id',
            'email',
            'active',
            'staff',
            'admin'
        )