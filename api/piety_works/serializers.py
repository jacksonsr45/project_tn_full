from rest_framework import serializers

from .models import PietWork

class PietWorkSerializer(serializers.ModelSerializer ):

    class Meta:
        model = PietWork
        fields = (
            'historic',
            'deb',
            'cred'
        )