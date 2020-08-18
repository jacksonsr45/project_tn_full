from rest_framework import serializers

from rest_framework.response import Response

from .models import User
from entities.models import Entities

class UserSerializer(serializers.ModelSerializer ):

    # HyperLinked Related Field entity by user 
    entitie_id = serializers.HyperlinkedRelatedField(many=True, read_only=True, view_name='entities-detail')

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
            'entitie_id',
            'groups'
        )

