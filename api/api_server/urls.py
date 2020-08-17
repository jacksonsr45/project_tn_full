from django.contrib import admin
from django.urls import path, include

from accounts.urls import accounts_router


urlpatterns = [
    path('', include(accounts_router.urls)),
    path('admin/', admin.site.urls),
]
