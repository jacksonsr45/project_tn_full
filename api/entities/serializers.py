from rest_framework import serializers

from rest_framework.response import Response

from .models import Entities

class EntitySerializer(serializers.ModelSerializer ):
    class Meta:
        model = Entities
        fields = (
            'name',
            'type_entity',
            'description',
            'user_id',
            'document_id'
        )