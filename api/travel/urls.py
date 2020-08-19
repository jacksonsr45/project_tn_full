from rest_framework import routers
from .views import TravelViewSet

travel_router = routers.DefaultRouter()
travel_router.register(r'viagens', TravelViewSet)