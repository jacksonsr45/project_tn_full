from rest_framework import viewsets


from .serializers import TravelSerializer
from .models import Travel

class TravelViewSet(viewsets.ModelViewSet):
    
    queryset = Travel.objects.all()
    serializer_class = TravelSerializer