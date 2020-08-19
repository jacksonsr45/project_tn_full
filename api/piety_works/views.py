from rest_framework import viewsets


from .serializers import PietWorkSerializer
from .models import PietWork

class PietWorkViewSet(viewsets.ModelViewSet):
    
    queryset = PietWork.objects.all()
    serializer_class = PietWorkSerializer