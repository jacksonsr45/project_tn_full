from rest_framework import viewsets
from rest_framework import permissions


from .serializers import EntitySerializer
from .models import Entities

class EntityViewSet(viewsets.ModelViewSet):
    
    queryset = Entities.objects.all()
    serializer_class = EntitySerializer