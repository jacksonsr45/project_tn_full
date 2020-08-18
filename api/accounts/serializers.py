from rest_framework import serializers

from phone_field import PhoneField

from rest_framework.response import Response

from .models import User

class UserSerializer(serializers.ModelSerializer ):

    # HyperLinked Related Field entity by user 
    entitie_id = serializers.HyperlinkedRelatedField(many=True, read_only=True, view_name='entity-detail')

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

